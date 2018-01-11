<?php
namespace App\Algorithm;

use Illuminate\Http\Request;
/**
 *
 */
class RandomiseAlgorithm
{
  /**
   *
   */
  protected $data;

  /**
   *
   */
  protected $easy;

  /**
   *
   */
  protected $medium;

  /**
   *
   */
  protected $hard;

  /**
   *
   */
  protected $attempted;

  /**
   *
   */
  public function __construct($ref)
  {
    $this->data = \App\Model\Questions::where("sec_id","=",$ref)->pluck('qid')->toArray();
    $this->easy = \App\Model\Questions::where("sec_id","=",$ref)->where("dif","=","e")->pluck('qid')->toArray();
    $this->medium = \App\Model\Questions::where("sec_id","=",$ref)->where("dif","=","m")->pluck('qid')->toArray();
    $this->hard = \App\Model\Questions::where("sec_id","=",$ref)->where("dif","=","h")->pluck('qid')->toArray();
    $this->attempted();
  }

  /**
   *
   */
  public function init(){
    
  }

  /**
   *
   */
  private attempted(Request $request){
    $this->attempted= $request->session()->get('qid_array');
  }

  /**
   *
   */
  private function easyAttempt(){
    return array_intersect($this->easy,$this->attemted);
  }

  /**
   *
   */
  private function mediumAttempt(){
    return array_intersect($this->medium,$this->attemted);
  }

  /**
   *
   */
  private function hardAttempt(){
    return array_intersect($this->hard,$this->attemted);
  }

  /**
   *
   */
  private function easyUnattempt(){
    return array_diff($this->easy,$this->easyAttempt());
  }

  /**
   *
   */
  private function mediumUnattempt(){
    return array_diff($this->easy,$this->mediumAttempt());
  }

  /**
   *
   */
  private function hardUnattempt(){
    return array_diff($this->easy,$this->hardAttempt());
  }

  /**
   *
   */
  private unattempted(Request $request){
    return array_unique(array_merge(array_merge($this->easyUnattempt(),$this->mediumUnattempt()),$this->hardUnattempt()));
  }
}

 ?>
