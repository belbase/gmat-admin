<?php
namespace App\Helper\GMAT;

use \App\Model\Questions;

class CheckAnswer{
  // public static function checkIR($id,$answer){
  //   $data=IR::where('qid','=',$id)->first();
  //   if(json_decode($data->answer)==json_decode($answer)) return 'p';
  //   else return 'f';
  // }
  public static function checkQA($id,$answer){
    $data=Questions::where('sec_id','=',4)->where('qid','=',$id)->first();
    foreach($data->options as $option){
      if($option->is_correct==1) $correctAnswer=$option->oid;
    }
    if($correctAnswer==$answer) return 'p';
    else return 'f';
  }
  /***
    * check if the given Answer is Correct or Not
    *
    */
  public static function checkVB($id,$answer){
    $data=Questions::where('sec_id','=',4)->where('qid','=',$id)->first();
    foreach($data->options as $option){
      if($option->is_correct==1) $correctAnswer=$option->oid;
    }
    if($correctAnswer==$answer) return 'p';
    else return 'f';
  }

}
 ?>
