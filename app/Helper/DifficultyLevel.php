<?php
namespace App\Helper;
/**
 *
 */
class DifficultyLevel
{
  public static function all()
  {
    $data=[
      'e'=>'Easy',
      'm'=>'Medium',
      'h'=>'Hard',
    ];
    return $data;
  }
  public static function get($get){
    $data=[
      'e'=>'Easy',
      'm'=>'Medium',
      'h'=>'Hard',
    ];
    return $data[strtolower($get)];
  }
}

 ?>
