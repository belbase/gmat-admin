<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Score;
use Illuminate\Support\Facades\Mail;

/**
 * handle the question reviews.
 */
class ReviewController extends Controller
{

  /**
   * present a view, listing the review belongs to a particular question section
   *
   * @param string $db a text with 2 characters
   *
   * @return void
   */
   public function index(){
    $data = \App\Model\Session::where('sec_id','=','2')->get();
    $db = strtoupper('aw');
    return view('review.index')->with([
      'title'=> \App\Algorithm\Questions\Section::getSection($db).' Section Review',
      'data'=> $data,
      'section'=>\App\Helper\SectionArray::getNameFromRef($db),
      'db'=>$db
    ]);
  }
  /**
   * change the review status of the question
   *
   * @param object $request containg post vaiables
   *
   * @return void
   */
  public function change(Request $request){

    $data=$request->all();
    $result='p';
    if($data['score']==0){
      $result='f';
    }
    // fetching the data from session table belongs to a particaular $session ID;
    $session =\App\Model\Session::where('refid','=',$data['refid'])->firstorfail();
    // storing the data to the session table
    $store= \App\Model\Session::where('refid','=',$data['refid'])->update([
      'result'=> $result,
      // 'score'=>$data['score'],
    ]);
    //sending socre email to the user
    Mail::to($session->user->email)->send(new Score($data));
    // redirect to the listing view
    return redirect('review/'.strtolower($data['db']))->with('success','The Email is Sucessfully sent to '.$session->user->email);
  }
}

 ?>
