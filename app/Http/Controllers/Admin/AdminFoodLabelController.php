<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodLabelValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminFoodLabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::leftMenu();
    }

    // Admin: list all submissions from all users
    public function index()
    {
        $records = FoodLabelValidation::with('user')
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin-views.label-validation.admin-list', compact('records'));
    }

    // Admin: view a single submission + add comments + upload label
    public function view($id)
    {
        $record = FoodLabelValidation::with('user')
            ->where('id', $id)
            ->where('is_deleted', 0)
            ->firstOrFail();

        return view('admin-views.label-validation.admin-view', compact('record'));
    }

    // Admin: save comments and/or upload final label
    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_comments' => 'nullable|string',
            'status'         => 'required|in:submitted,under_review,completed',
            'final_label'    => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        $record = FoodLabelValidation::where('id', $id)
            ->where('is_deleted', 0)
            ->firstOrFail();

        $data = [
            'admin_comments' => $request->admin_comments,
            'status'         => $request->status,
        ];

        if ($request->hasFile('final_label')) {
            // Delete old file if exists
            if ($record->final_label_path) {
                Storage::disk('local')->delete('food-labels/' . $record->final_label_path);
            }

            $file     = $request->file('final_label');
            $origName = $file->getClientOriginalName();
            $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $origName);

            Storage::disk('local')->putFileAs('food-labels', $file, $fileName);

            $data['final_label_path']          = $fileName;
            $data['final_label_original_name'] = $origName;
        }

        $record->update($data);

        return redirect('/admin-food-labels/view/' . $id)->with('success', 'Label record updated successfully.');
    }

    // Admin: delete a record
    public function delete($id)
    {
        FoodLabelValidation::where('id', $id)->update(['is_deleted' => 1]);

        return redirect('/admin-food-labels/list')->with('success', 'Record deleted.');
    }

    // Admin: download final label
    public function download($id)
    {
        $record = FoodLabelValidation::where('id', $id)
            ->where('is_deleted', 0)
            ->firstOrFail();

        if (!$record->final_label_path) {
            abort(404, 'No label file available.');
        }

        $path = storage_path('app/food-labels/' . $record->final_label_path);

        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        return response()->download($path, $record->final_label_original_name);
    }
}
