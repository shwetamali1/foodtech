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

    // List all submissions for the logged-in user
    public function index()
    {
        $records = FoodLabelValidation::where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin-views.label-validation.list', compact('records'));
    }

    // Show multi-step creation form
    public function create()
    {
        return view('admin-views.label-validation.create');
    }

    // Store new submission
    public function store(Request $request)
    {
        $request->validate([
            'product_name'               => 'required|string|max:255',
            'product_category'           => 'required|string|max:255',
            'fssai_license_no'           => 'required|string|max:100',
            'net_quantity'               => 'required|string|max:100',
            'country_of_origin'          => 'required|string|max:100',
            'vegetarian_type'            => 'required|in:vegetarian,non-vegetarian,vegan,egg',
            'manufacturer_name_address'  => 'required|string',
        ]);

        $nutritional = [
            'energy_kcal'       => ['value' => $request->energy_kcal,      'unit' => $request->energy_unit      ?? 'kcal'],
            'total_fat'         => ['value' => $request->total_fat,         'unit' => $request->total_fat_unit   ?? 'g'],
            'protein'           => ['value' => $request->protein,           'unit' => $request->protein_unit     ?? 'g'],
            'saturated_fat'     => ['value' => $request->saturated_fat,     'unit' => $request->saturated_fat_unit ?? 'g'],
            'carbohydrate'      => ['value' => $request->carbohydrate,      'unit' => $request->carbohydrate_unit ?? 'g'],
            'trans_fat'         => ['value' => $request->trans_fat,         'unit' => $request->trans_fat_unit   ?? 'g'],
            'total_sugars'      => ['value' => $request->total_sugars,      'unit' => $request->total_sugars_unit ?? 'g'],
            'cholesterol'       => ['value' => $request->cholesterol,       'unit' => $request->cholesterol_unit ?? 'mg'],
            'added_sugars'      => ['value' => $request->added_sugars,      'unit' => $request->added_sugars_unit ?? 'g'],
            'sodium'            => ['value' => $request->sodium,            'unit' => $request->sodium_unit      ?? 'mg'],
            'dietary_fibre'     => ['value' => $request->dietary_fibre,     'unit' => $request->dietary_fibre_unit ?? 'g'],
            'vitamin_a'         => ['value' => $request->vitamin_a,         'unit' => $request->vitamin_a_unit   ?? 'mcg'],
            'calcium'           => ['value' => $request->calcium,           'unit' => $request->calcium_unit     ?? 'mg'],
            'vitamin_c'         => ['value' => $request->vitamin_c,         'unit' => $request->vitamin_c_unit   ?? 'mg'],
            'iron'              => ['value' => $request->iron,              'unit' => $request->iron_unit        ?? 'mg'],
            'vitamin_d'         => ['value' => $request->vitamin_d,         'unit' => $request->vitamin_d_unit   ?? 'mcg'],
            'potassium'         => ['value' => $request->potassium,         'unit' => $request->potassium_unit   ?? 'mg'],
        ];

        FoodLabelValidation::create([
            'user_id'                   => Auth::id(),
            'product_name'              => $request->product_name,
            'product_category'          => $request->product_category,
            'brand_name'                => $request->brand_name,
            'sub_category'              => $request->sub_category,
            'fssai_license_no'          => $request->fssai_license_no,
            'net_quantity'              => $request->net_quantity,
            'country_of_origin'         => $request->country_of_origin,
            'vegetarian_type'           => $request->vegetarian_type,
            'manufacturer_name_address' => $request->manufacturer_name_address,
            'nutritional_info'          => $nutritional,
            'ingredients'               => $request->ingredients,
            'additives_ins_no'          => $request->additives_ins_no,
            'allergens'                 => $request->allergens ?? [],
            'storage_conditions'        => $request->storage_conditions,
            'instructions_for_use'      => $request->instructions_for_use,
            'caution_warning'           => $request->caution_warning,
            'status'                    => 'submitted',
        ]);

        return redirect('/label-validation/list')->with('success', 'Food label submitted successfully for validation.');
    }

    // Show a single submission (user view – comments + download)
    public function view($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        return view('admin-views.label-validation.view', compact('record'));
    }

    // Show edit form
    public function edit($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('is_deleted', 0)
            ->firstOrFail();

        // Only allow editing if not yet completed
        if ($record->status === 'completed') {
            return redirect('/label-validation/list')->with('error', 'Completed labels cannot be edited.');
        }

        return view('admin-views.label-validation.edit', compact('record'));
    }

    // Update submission
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
            'product_name'               => 'required|string|max:255',
            'product_category'           => 'required|string|max:255',
            'fssai_license_no'           => 'required|string|max:100',
            'net_quantity'               => 'required|string|max:100',
            'country_of_origin'          => 'required|string|max:100',
            'vegetarian_type'            => 'required|in:vegetarian,non-vegetarian,vegan,egg',
            'manufacturer_name_address'  => 'required|string',
        ]);

        $nutritional = [
            'energy_kcal'       => ['value' => $request->energy_kcal,      'unit' => $request->energy_unit      ?? 'kcal'],
            'total_fat'         => ['value' => $request->total_fat,         'unit' => $request->total_fat_unit   ?? 'g'],
            'protein'           => ['value' => $request->protein,           'unit' => $request->protein_unit     ?? 'g'],
            'saturated_fat'     => ['value' => $request->saturated_fat,     'unit' => $request->saturated_fat_unit ?? 'g'],
            'carbohydrate'      => ['value' => $request->carbohydrate,      'unit' => $request->carbohydrate_unit ?? 'g'],
            'trans_fat'         => ['value' => $request->trans_fat,         'unit' => $request->trans_fat_unit   ?? 'g'],
            'total_sugars'      => ['value' => $request->total_sugars,      'unit' => $request->total_sugars_unit ?? 'g'],
            'cholesterol'       => ['value' => $request->cholesterol,       'unit' => $request->cholesterol_unit ?? 'mg'],
            'added_sugars'      => ['value' => $request->added_sugars,      'unit' => $request->added_sugars_unit ?? 'g'],
            'sodium'            => ['value' => $request->sodium,            'unit' => $request->sodium_unit      ?? 'mg'],
            'dietary_fibre'     => ['value' => $request->dietary_fibre,     'unit' => $request->dietary_fibre_unit ?? 'g'],
            'vitamin_a'         => ['value' => $request->vitamin_a,         'unit' => $request->vitamin_a_unit   ?? 'mcg'],
            'calcium'           => ['value' => $request->calcium,           'unit' => $request->calcium_unit     ?? 'mg'],
            'vitamin_c'         => ['value' => $request->vitamin_c,         'unit' => $request->vitamin_c_unit   ?? 'mg'],
            'iron'              => ['value' => $request->iron,              'unit' => $request->iron_unit        ?? 'mg'],
            'vitamin_d'         => ['value' => $request->vitamin_d,         'unit' => $request->vitamin_d_unit   ?? 'mcg'],
            'potassium'         => ['value' => $request->potassium,         'unit' => $request->potassium_unit   ?? 'mg'],
        ];

        $record->update([
            'product_name'              => $request->product_name,
            'product_category'          => $request->product_category,
            'brand_name'                => $request->brand_name,
            'sub_category'              => $request->sub_category,
            'fssai_license_no'          => $request->fssai_license_no,
            'net_quantity'              => $request->net_quantity,
            'country_of_origin'         => $request->country_of_origin,
            'vegetarian_type'           => $request->vegetarian_type,
            'manufacturer_name_address' => $request->manufacturer_name_address,
            'nutritional_info'          => $nutritional,
            'ingredients'               => $request->ingredients,
            'additives_ins_no'          => $request->additives_ins_no,
            'allergens'                 => $request->allergens ?? [],
            'storage_conditions'        => $request->storage_conditions,
            'instructions_for_use'      => $request->instructions_for_use,
            'caution_warning'           => $request->caution_warning,
        ]);

        return redirect('/label-validation/list')->with('success', 'Food label updated successfully.');
    }

    // Soft delete
    public function delete($id)
    {
        FoodLabelValidation::where('id', $id)
            ->where('user_id', Auth::id())
            ->update(['is_deleted' => 1]);

        return redirect('/label-validation/list')->with('success', 'Record deleted successfully.');
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
