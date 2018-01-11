<?php
namespace App\Helper\GMAT;

use Illuminate\Http\Request;
/**
 *
 */
class Timer
{
  protected $session = strtotime('3 hours 30 minutes');

  protected $subSession=[
    'IR' => strtotime('30 minutes'),
    'AW' => strtotime('30 minutes'),
    'QA' => strtotime('75 minutes'),
    'VB' => strtotime('75 minutes'),
    'OBR' => strtotime('8 minutes'),
  ];

  protected $startTime;
  protected $endTime;

  public function __construct(Request $request){
    if($request->session()->has('started_at')){
      $this->startTime = $request->session()->get('started_at');
    }
    else{

    }
    if($request->session()->has('duration'))
    {
      $this->startTime = $request->session()->get('duration');
    }
    else{

    }

  }
  public static function timer(Request $request)
  {
    // return ;
  }
  public function startTime(){
      return $this->timestamp;
  }
  public function endTime(){

  }
}

 ?>
