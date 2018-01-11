<?php
namespace App\Helper;

class LevelIndicaterArray {
  protected $name=[
    'EASY'=>'Easy',
    'MEDI'=>'Medium',
    'HARD'=>'Hard',
  ];
  protected $color =[
    'EASY'=>'success',
    'MEDI'=>'warning',
    'HARD'=>'danger',
  ];
    public function color($key)
    {
      return $this->color[$key];
    }
    public function name($key)
    {
      return $this->name[$key];
    }
}
