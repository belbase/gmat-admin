<?php
namespace App\Helper\GMAT;

// To Fetch
use \App\Model\Questions;
// Store To
use \App\Model\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class StoreData{
  protected $db;

  public function __construct(){
    $this->db=new Session;

  }
  public function aw(Request $request){
    $array=$request->toArray();
    foreach($array as $key=>$item){
      if($key=='response'){
        $result = $item;
      }
      if($key=='time_taken'){
        $time = $item;
      }
      if($key=='submit' && $item=="submit"){
        $save=(bool) true;
      }
    }
    $this->db->sid = $request->session()->get('sess_id');
    $this->db->uid = Auth::id();
    $this->db->qid = $request->session()->get('qid');
    $this->db->sec_id = $request->session()->get('section');
    if(isset($result))$this->db->answer = $result;
    // else $this->db->answer = "N";
    if(!isset($result))$this->db->result='t';
    $this->db->time_taken = $time;
    // $this->db->status=1;
    // else $this->db->time_taken = "00:30:00";
    $this->db->save();
  }
  public function vb(Request $request){
    $array=$request->toArray();
    foreach($array as $key=>$item){
      if($key=='option'){
        $result = $item;
      }
      if($key=='time_taken'){
        $time = $item;
      }
      if($key=='submit' && $item=="submit"){
        $save=(bool) true;
      }
      if($key=='count_taken'){
        $count = $item;
      }
    }
    $this->db->sid = $request->session()->get('sess_id');
    $this->db->uid = Auth::id();
    $this->db->qid = $request->session()->get('qid');
    $this->db->sec_id = $request->session()->get('section');
    if(isset($result)) {
        $this->db->answer = $result;
        $this->db->result = CheckAnswer::checkVB($request->session()->get('qid'),$result);
    }
    if(!isset($result))$this->db->result='t';
    $this->db->time_taken = $time;
    // $this->db->status=1;
    $this->db->save();
    $request->session()->put('time', $count);
  }

  // public function ir(Request $request){
  //   $array=$request->toArray();
  //   foreach($array as $key=>$item){
  //     if(\is_numeric($key)){
  //       $result[$key]=$item;
  //     }
  //     if($key='submit' && $item="submit"){
  //       $save=(bool) true;
  //     }
  //   }
  //   $fResult=\json_encode($result);
  //   $this->db->sid = $request->session()->get('sess_id');
  //   $this->db->uid = Auth::id();
  //   $this->db->qid = $request->session()->get('qid');
  //   $this->db->sec_id = $request->session()->get('section');
  //   $this->db->answer = $fResult;
  //   $this->db->result = CheckAnswer::checkIR($request->session()->get('qid'),$fResult);
  //   $this->db->time_taken = strtotime('00:03:');
  //   $this->db->save();
  // }
  // public function qa(Request $request){
  //   $array=$request->toArray();
  //   foreach($array as $key=>$item){
  //     if($key=='option'){
  //       $result = $item;
  //     }
  //     if($key=='submit' && $item=="submit"){
  //       $save=(bool) true;
  //     }
  //   }
  //   $this->db->sid = $request->session()->get('sess_id');
  //   $this->db->uid = Auth::id();
  //   $this->db->qid = $request->session()->get('qid');
  //   $this->db->sec_id = $request->session()->get('section');
  //   $this->db->answer = $result;
  //   $this->db->result = CheckAnswer::checkQA($request->session()->get('qid'),$result);
  //   $this->db->time_taken = strtotime('00:03:');
  //   $this->db->save();
  // }

}
 ?>
