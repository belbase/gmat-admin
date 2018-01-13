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
    if($request->ajax()){
      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $img=$request->file('image')->store('img');
          // $data = ['image_name'=> 'assets\\'.$img];
          return $img; //($sub);
        }
      return response()->json($request->all());
    }
    else{
      $sub=$request->file('image')->store('img');
      // $data= json_encode("{'image':'".$sub."'}");
      var_dump($sub);
    }
  }
}

 ?>
