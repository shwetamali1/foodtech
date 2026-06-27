<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct() {
	}

	public static function leftMenu() {
		$LeftMenu = DB::table('web_menu')
			->where([
				['parent_id', '=', 0],
				['status', '=', 1]
				])
			->orderBy('orders','asc')
			->get();
		
		View::share('LeftMenu', $LeftMenu);
	}
	public function sendEmail(){
		Mail::send('emails.test', [], function ($message) {
			$message->to('maliganesh01@gmail.com')->subject('Test Food Mail');
		});
		return 'Mail sent!';
	}
    public function fileStore(Request $request): JsonResponse
    {
        $file = $request->file('file');
        $allowedExtensions = ['jpeg','jpg','png','gif','mp4','avi','mov','pdf','doc','docx'];
        $ext = strtolower($file->getClientOriginalExtension());

        if (!in_array($ext, $allowedExtensions)) {
            return response()->json(['error' => 'File type not allowed'], 422);
        }

        $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
        $file->move(public_path('images'), $fileName);

        return response()->json(['success' => $fileName]);
    }

    public function privateFileStore(Request $request): JsonResponse
    {
        $file = $request->file('file');
        $allowedExtensions = ['pdf', 'doc', 'docx'];
        $ext = strtolower($file->getClientOriginalExtension());

        if (!in_array($ext, $allowedExtensions)) {
            return response()->json(['error' => 'Only PDF/DOC files are allowed'], 422);
        }

        $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());

        Storage::disk('local')->putFileAs('reports', $file, $fileName);

        return response()->json(['success' => $fileName]);
    }
    public function fileRemove(Request $request)
    {
        $filename = $request->input('filename');
        $path = public_path('images/' . $filename);
        if (file_exists($path)) {
            unlink($path);
            return response()->json(['message' => 'File deleted']);
        }
        else{
            return response()->json(['error' => 'File not found'], 404);
        }
        
      
    }
}
