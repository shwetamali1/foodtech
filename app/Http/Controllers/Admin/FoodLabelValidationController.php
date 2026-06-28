<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodLabelValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return view('admin-views.label-validation.create');
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
