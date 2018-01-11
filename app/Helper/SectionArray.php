<?php
namespace App\Helper;

use \App\Model\Section;
use Illuminate\Http\Request;

class SectionArray{
    public static function getRef($id){
      $db=Section::all();
      $array= [];
      foreach($db as $item){
        $array[$item['id']]=$item['sec_ref'];
      }
      return $array[$id];
    }
    public static function getID($ref){
      $db=Section::all();
      $array= [];
      foreach($db as $item){
        $array[$item['sec_ref']]=$item['id'];
      }
      return $array[$ref];
    }
    public static function getNameFromRef($ref){
      $db=Section::all();
      $array= [];
      foreach($db as $item){
        $array[$item['sec_ref']]=$item['title'];
      }
      return $array[$ref];
    }
    /**
     *
     *************************************************************************************
     */
    public static function getIDs($Array){
      $db=Section::
      // where()->
      all();
      $array= [];
      foreach($db as $item){
        $array[$item['sec_ref']]=$item['id'];
      }
      return $array;
    }
    public static function checkRef($ref){
      $db=Section::all();
      $array = [];
      foreach($db as $item){
        $array[]=$item['sec_ref'];
      }
      return in_array($ref, $array);
    }
     /**
      *
      *************************************************************************************
      */
    public static function getName($id){
      $db=Section::all();
      $array= [];
      foreach($db as $item){
        $array[$item['id']]=$item['title'];
      }
      return $array[$id];
    }
    public static function nqIR(){
      $ir = Section::where('sec_ref','=','IR')->first();
      return $ir->no_of_q;
    }
    public static function nqAW(){
      $ir = Section::where('sec_ref','=','AW')->first();
      return $ir->no_of_q;
    }
    public static function nqQA(){
      $ir = Section::where('sec_ref','=','QA')->first();
      return $ir->no_of_q;
    }
    public static function nqVB(){
      $ir = Section::where('sec_ref','=','VB')->first();
      return $ir->no_of_q;
    }
    public static function prefStack(){

    }
    public static function switch($request){
        if($request->session()->has('section')){
          $array = $request->session()->get('preference');
          $array = array_diff($array,[$request->session()->get('section'),]);
          $request->session()->put('preference',$array);
          $request->session()->put('section',current($array));
          $request->session()->put('qid',1);
        }
    }
    public static function checkAvalibilty($val,Request $request){
        $db= \App\Model\Questions::where('sec_id','=',$val);
        $exatval = $db->first()->section()->first();
        $qidCount=$request->session()->get('count');

        if($qidCount <= $db->count() && $qidCount <= $exatval->no_of_q){
          return true;
        }
        return false;
        var_dump($db);
    }
}
