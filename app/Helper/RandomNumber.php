<?php
namespace App\Helper;
/**
 *
 */

class RandomNumber
{

  public static function fromArray($array, $exclude=[])
  {
    if(count($exclude)!=0){
      $array = array_diff($array,$exclude);
      if(count($array)==0) return false;
    }
    $string=array_rand($array);
    return $array[$string];
  }
}

  ?>
