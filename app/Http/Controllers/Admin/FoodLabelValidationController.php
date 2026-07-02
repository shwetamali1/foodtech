<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodLabelValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class FoodLabelValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::leftMenu();
    }

    public function index()
    {
        $records = FoodLabelValidation::where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin-views.label-validation.list', compact('records'));
    }

    public function create()
    {
        $quota = $this->quotaStatus();
        $addonCredits = (int) DB::table('users')->where('id', Auth::id())->value('addon_label_credits');

        return view('admin-views.label-validation.create', compact('quota', 'addonCredits'));
    }

    private function hasActiveSubscription(): bool
    {
        $billing = DB::table('billing_details')
            ->where('user_id', Auth::id())
            ->where('payment_plan', 'subcribe')
            ->orderByDesc('id')
            ->first();

        if (!$billing) {
            return false;
        }

        // If expiry_date is set and already past, subscription is expired
        if (!empty($billing->expiry_date) && Carbon::parse($billing->expiry_date)->isPast()) {
            return false;
        }

        $payment = DB::table('payments')
            ->where('billing_detail_id', $billing->id)
            ->orderByDesc('id')
            ->first();

        return $payment && $payment->status === 'success';
    }

    /**
     * Extract total label validation count from a subscription's features text.
     * Matches patterns like "3 Indian label validations", "1 Export label validation(One Country)".
     */
    private function parseLabelValidationCount(?string $featuresJson): ?int
    {
        if (empty($featuresJson)) {
            return null;
        }
        $arr  = json_decode($featuresJson, true);
        $text = is_array($arr) && isset($arr[0]) ? $arr[0] : (string) $featuresJson;

        preg_match_all('/(\d+)[^\n,]*label\s+validations?/i', $text, $matches);

        if (empty($matches[1])) {
            return null;
        }
        $total = array_sum(array_map('intval', $matches[1]));
        return $total > 0 ? $total : null;
    }

    /**
     * Plan's label validation quota for the current billing cycle.
     * Checks label_validation_limit column first; falls back to parsing features text.
     * addon_label_credits on the user are added to the plan limit.
     */
    private function quotaStatus(): array
    {
        $billing = DB::table('billing_details')
            ->where('user_id', Auth::id())
            ->where('payment_plan', 'subcribe')
            ->orderByDesc('id')
            ->first();

        $plan = $billing ? DB::table('subscriptions')->where('id', $billing->subscribe_id)->first() : null;

        // Prefer the dedicated column; fall back to summing numbers from features text
        $planLimit = $plan->label_validation_limit ?? null;
        if (is_null($planLimit) && $plan) {
            $planLimit = $this->parseLabelValidationCount($plan->features ?? null);
        }

        // Include any purchased add-on credits in the total limit
        $addonCredits = (int) DB::table('users')->where('id', Auth::id())->value('addon_label_credits');
        $limit = is_null($planLimit) ? null : ($planLimit + $addonCredits);

        if (is_null($limit)) {
            return ['unlimited' => true, 'limit' => null, 'plan_limit' => null, 'addon_credits' => $addonCredits, 'used' => 0, 'remaining' => null];
        }

        $query = FoodLabelValidation::where('user_id', Auth::id())
            ->where('is_deleted', 0);

        if (!empty($billing->subscription_start_date)) {
            $query->where('created_at', '>=', $billing->subscription_start_date);
        }

        if (!empty($billing->expiry_date)) {
            $query->where('created_at', '<=', $billing->expiry_date);
        }

        $used = $query->count();

        return [
            'unlimited'     => false,
            'limit'         => $limit,
            'plan_limit'    => $planLimit,
            'addon_credits' => $addonCredits,
            'used'          => $used,
            'remaining'     => max(0, $limit - $used),
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'              => 'required|string|max:255',
            'product_category'          => 'required|string|max:255',
            'business_category'         => 'required|string|max:255',
            'fssai_license_no'          => 'required|string|max:100',
            'net_quantity'              => 'required|string|max:100',
            'manufacturer_name_address' => 'required|string',
            'lab_report'                => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        if (!$this->hasActiveSubscription()) {
            // No active plan — only addon credits can unlock submission
            $addonCredits = (int) DB::table('users')->where('id', Auth::id())->value('addon_label_credits');
            if ($addonCredits <= 0) {
                return redirect('/label-validation/create')
                    ->with('error', "You don't have an active subscription plan. Please purchase a plan or an add-on credit to submit a label validation.");
            }
            // Decrement the credit (no plan to cover it)
            DB::table('users')->where('id', Auth::id())->decrement('addon_label_credits');
        } else {
            // Has active plan — quota already includes addon credits in the total
            $quota = $this->quotaStatus();

            if (!$quota['unlimited'] && $quota['remaining'] <= 0) {
                return redirect('/label-validation/create')->with('error',
                    "You've used all {$quota['limit']} label validations available on your plan" .
                    ($quota['addon_credits'] > 0 ? ' (including add-on credits)' : '') .
                    '. Please purchase an add-on service to continue.');
            }
        }

        $labReportPath = null;
        $labReportOrigName = null;

        if ($request->hasFile('lab_report')) {
            $file = $request->file('lab_report');
            $labReportOrigName = $file->getClientOriginalName();
            $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $labReportOrigName);
            Storage::disk('local')->putFileAs('food-labels/lab-reports', $file, $fileName);
            $labReportPath = $fileName;
        }

        FoodLabelValidation::create([
            'user_id'                   => Auth::id(),
            'product_name'              => $request->product_name,
            'product_category'          => $request->product_category,
            'business_category'         => $request->business_category,
            'fssai_license_no'          => $request->fssai_license_no,
            'net_quantity'              => $request->net_quantity,
            'manufacturer_name_address' => $request->manufacturer_name_address,
            'ingredients'               => $request->ingredients,
            'additives_ins_no'          => $request->additives_ins_no,
            'storage_conditions'        => $request->storage_conditions,
            'instructions_for_use'      => $request->instructions_for_use,
            'caution_warning'           => $request->caution_warning,
            'lab_report_path'           => $labReportPath,
            'lab_report_original_name'  => $labReportOrigName,
            'status'                    => 'submitted',
        ]);

        return redirect('/label-validation/list')->with('success', 'Food label submitted successfully for validation.');
    }

    public function view($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        return view('admin-views.label-validation.view', compact('record'));
    }

    public function edit($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        if ($record->status === 'completed') {
            return redirect('/label-validation/list')->with('error', 'Completed labels cannot be edited.');
        }

        return view('admin-views.label-validation.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        if ($record->status === 'completed') {
            return redirect('/label-validation/list')->with('error', 'Completed labels cannot be edited.');
        }

        $request->validate([
            'product_name'              => 'required|string|max:255',
            'product_category'          => 'required|string|max:255',
            'business_category'         => 'required|string|max:255',
            'fssai_license_no'          => 'required|string|max:100',
            'net_quantity'              => 'required|string|max:100',
            'manufacturer_name_address' => 'required|string',
            'lab_report'                => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        $data = [
            'product_name'              => $request->product_name,
            'product_category'          => $request->product_category,
            'business_category'         => $request->business_category,
            'fssai_license_no'          => $request->fssai_license_no,
            'net_quantity'              => $request->net_quantity,
            'manufacturer_name_address' => $request->manufacturer_name_address,
            'ingredients'               => $request->ingredients,
            'additives_ins_no'          => $request->additives_ins_no,
            'storage_conditions'        => $request->storage_conditions,
            'instructions_for_use'      => $request->instructions_for_use,
            'caution_warning'           => $request->caution_warning,
        ];

        if ($request->hasFile('lab_report')) {
            // Delete old lab report
            if ($record->lab_report_path) {
                Storage::disk('local')->delete('food-labels/lab-reports/' . $record->lab_report_path);
            }
            $file = $request->file('lab_report');
            $origName = $file->getClientOriginalName();
            $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $origName);
            Storage::disk('local')->putFileAs('food-labels/lab-reports', $file, $fileName);
            $data['lab_report_path']          = $fileName;
            $data['lab_report_original_name'] = $origName;
        }

        $record->update($data);

        return redirect('/label-validation/list')->with('success', 'Food label updated successfully.');
    }

    public function delete($id)
    {
        FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->update(['is_deleted' => 1]);

        return redirect('/label-validation/list')->with('success', 'Record deleted successfully.');
    }

    // Download lab report (user)
    public function labReportDownload($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        if (!$record->lab_report_path) {
            abort(404, 'No lab report available.');
        }

        $path = storage_path('app/food-labels/lab-reports/' . $record->lab_report_path);

        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        return response()->download($path, $record->lab_report_original_name);
    }

    // Download final label uploaded by admin
    public function download($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        if (!$record->final_label_path) {
            abort(404, 'No label file available yet.');
        }

        $path = storage_path('app/food-labels/' . $record->final_label_path);

        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        return response()->download($path, $record->final_label_original_name);
    }
}
