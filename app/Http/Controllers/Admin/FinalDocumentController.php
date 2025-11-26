<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FeatureDocument;

class FinalDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::leftMenu();
    }

    public function index()
    {
        // Logged-in user id
        $userId = Auth::user()->id;

        // Fetch documents for this user
        $documents = FeatureDocument::where('user_id', $userId)
                                    ->orderBy('id', 'DESC')
                                    ->get();

        return view('admin-views.final-documents.list', compact('documents'));
    }

    // Download Function
    public function download($id)
    {
        
        $doc = FeatureDocument::findOrFail($id);

        $path = storage_path('app/public/' . $doc->file_path);
        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        return response()->download($path, $doc->original_name);
    }
}
