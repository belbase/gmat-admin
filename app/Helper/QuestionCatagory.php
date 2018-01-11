<?php
namespace App\Helper;
/**
 *
 */
class QuestionCatagory
{

  public static function all()
  {
    $data=[
      'PRGOT'=>'Analytical Assignment Writing',
      'SMCQT'=>'Standard Multiple Choice',
      'STIGT'=>'Graphic Based Select Options',
      'BMCQC'=>'Binary MCQ (Column Based)',
      'BMCQR'=>'Binary MCQ (Row Based)',
    ];
    return $data;
  }
  public static function get($get){
    $data=[
      'PRGOT'=>'Analytical Assignment Writing',
      'SMCQT'=>'Standard Multiple Choice',
      'STIGT'=>'Graphic Based Select Options',
      'BMCQC'=>'Binary MCQ (Column Based)',
      'BMCQR'=>'Binary MCQ (Row Based)',
    ];
    return $data[strtoupper($get)];
  }
}

 ?>
