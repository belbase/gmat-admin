<?php
namespace App\Helper;

use App\Model\Session;
 /**
  *
  */
 class RandomKeyGenerater
 {
   protected $key;

   public function sessKeyGen()
   {
     $key=substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_'),0,25);
     $data=Session::where('refid','=',$key)->get();
     if(empty($data)) $this->sessKeyGen();
     else return $key;
   }
 }

?>
