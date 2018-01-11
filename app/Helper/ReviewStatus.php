<?php
namespace App\Helper;

/**
 *
 */
class ReviewStatus
{

  public static function tableVal($status)
  {
    $array=[
      'n'=>'table-warning',
      'p'=>'table-success',
      'f'=>'table-danger',
      't'=>'table-warning',
    ];
    return $array[$status];
  }
  public static function statusVal($status)
  {
    $array=[
      'n'=>'Under Review',
      'p'=>'Passed',
      'f'=>'Failed',
      't'=>'Time Out'
    ];
    return $array[$status];
  }
}

 ?>
