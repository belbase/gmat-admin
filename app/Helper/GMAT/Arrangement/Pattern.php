<?php
namespace App\Helper\GMAT\Arrangement;

trait Pattern
{

  /**
   *
   */
  public function sub($key='default')
  {
    $tmp=[];
    if($key=='default')return $this->subcatagory;
    else{
      $tmp[$key]= $this->subcatagory[$key];
      return array_unique(array_merge($tmp,$this->subcatagory));
    }
  }

  /**
   *
   */
  public function getSub($key){
    try{
        return $this->subcatagory[$key];
    }
    catch(\Exception $e){
      report($e);
    }
  }

  /**
   *
   */
  public function dif($key='default')
  {
      $temp=[];
      if($key=='default')return $this->level;
      else{
        $temp[$key] = $this->level[$key];
        return array_unique(array_merge($temp,$this->level));
      }
  }
}

 ?>
