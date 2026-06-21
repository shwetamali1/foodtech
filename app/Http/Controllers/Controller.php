<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Mail\TestMail;
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
// 	public static function notifications() {
// 	    $UserId = Auth::user()->id;
// 		$notifications = DB::table('notifications')
// 			->where([
// 				['send_to', '=', $UserId]
// 				])
// 			->orderBy('orders','asc')
// 			->get();
		
// 		View::share('notifications', $notifications);
// 	}
	public function sendEmail(){
		/*Mail::to('maliganesh01@gmail.com')->send(new TestMail());
*/		
		Mail::send('emails.test', [], function ($message) {
			$message->to('maliganesh01@gmail.com')->subject('Test Food Mail');
		});
		return 'Mail sent!';
	}
	public function uploadFileS3($s3FileName, $fileDisplayName, $localPath, $directory = null) {
        $rv = '';

        if(!empty($s3FileName)) {
            $currentYear = date("Y");
            $isExist = Storage::disk('s3')->exists($directory.'/'.$currentYear);
            if($isExist) {
                $path = S3Demo.'/'.$directory.'/'.$currentYear;
            } else {
                Storage::disk()->makeDirectory($currentYear); // make directory
                $path = S3Demo.'/'.$directory.'/'.$currentYear;
            }

            $filePath = $path.'/'.$s3FileName;
            $storegPath = storage_path('app/public/uploadfile/temp/');
            $response = Storage::disk('s3')->put($filePath, file_get_contents($storegPath.$fileDisplayName));

            $rv = $filePath;
        }
        return $rv;
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
    public function fileRemove(Request $request)
    {
        $filename = $request->input('filename');
        //$path = public_path('images').'/'. $filename;
        //$path = 'images/' . $filename;
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
