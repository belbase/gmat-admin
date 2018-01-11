<?php
namespace App\Algorithm\Questions;

/**
 *
 */
class Option
{

  public static function BMCQR($request)
  {
    $array=$request->all();
    $subarray=[];
    foreach($array as $key => $value){
      if(is_numeric($key)){
        $subarray[$key] = $value;
      }
    }
    $var=[
      'statement'=>$array['statement'],
      'hd' =>[
        '0'=>$array['head1'],
        '1'=>$array['head2'],
        '2'=>'',
      ],
      'opt'=> $subarray,
    ];
    return json_encode($var);
  }
  public static function BMCQC($request)
  {
    $array=$request->all();
    $subarray=[];
    foreach($array as $key => $value){
      if(is_numeric($key)){
        $subarray[$key] = $value;
      }
    }
    $var=[
      'statement'=>$array['statement'],
      'hd' =>[
        '0'=>$array['head1'],
        '1'=>$array['head2'],
        '2'=>'',
      ],
      'opt'=> $subarray,
    ];
    return json_encode($var);
  }
  public static function SMCQT($request)
  {
    $array=$request->all();
    $subarray=[];
    foreach($array as $key => $value){
      if(is_numeric($key)){
        $subarray[$key] = $value;
      }
    }
    $var=[
      'statement'=>$array['statement'],
      'opt'=> $subarray,
    ];
    return json_encode($var);
  }
  public static function GIIR(){
    
  }
}

 ?>
