<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
/**
 *
 */
class ResourceController extends Controller
{
  public function __construct(){

  }
  function uploadImages(Request $request)
  {
      // return $request->all();
      $_token = $request->post('ckCsrfToken');
      $ckeditor = $request->get('CKEditor');
      $langcode = $request->get('langcode');
      $funcNum = $request->get('CKEditorFuncNum');
      if ($request->hasFile('upload')) {
          $file = $request->file('upload');
          $img=$request->file('upload')->store('img');
          $url = env('FRONTEND_SITE', 'https://www.edushastra.online').'/assets/uploads/'.$img;
          $message = 'The uploaded file has been renamed';
          return view('form.image-response')->with([
            'url'=>$url,
            'message'=>$message,
            'funcNum'=>$funcNum,
          ]);
        }
  }
  function browseImages(){
    return view('form.image-browse');
  }
}

 ?>
