<?php
namespace App\Algorithm\Questions;

/**
 *
 */
class Section
{

  public static function getSection($argument)
  {
    $array=[
      'IR'=>'Integrated Reasoning',
      'AW'=>'Analytical Writing Assignment',
      'QA'=>'Quantitative',
      'VB'=>'Verbal',
      'LR'=>'Logical Reasoning',
      'DI'=>'Data Interpretation',
      'TBA'=>'Table Analysis',
      'TPA'=>'Two Part Analysis',
      'GPA'=>'Graphic Analysis',
      'MSR'=>'Multi source Reasoning',
    ];
    return $array[ $argument ];
  }
  public static function getType($argument)
  {
    $array=[
      'SMCQT'=>'Urinary MCQ Type Question',
      'BMCQR'=>'Binary MCQ Question (Row Based)',
      'BMCQC'=>'Binary MCQ Question (Column Based)',
    ];
    return $array[ $argument ];
  }
}

 ?>
