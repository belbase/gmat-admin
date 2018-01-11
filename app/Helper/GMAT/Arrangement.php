<?php
namespace App\Helper\GMAT;
/**
 *
 */

class Arrangement{

    protected $arrangement='{
      "1":{
          "0":{
            "1":"AW",
            "2":"IR"
          },
          "3":"QA",
          "4":"VB"
      },
      "2":{
        "4":"VB",
        "3":"QA",
        "0":{
          "1":"IR",
          "2":"AW"
        }
      },
      "3":{
        "3":"QA",
        "4":"VB",
        "0":{
          "1":"IR",
          "2":"AW"
        }
      }
    }';

    public function order(){
      $array = [];
      $data = json_decode($this->arrangement);
      foreach ($data as $order => $items) {
        $subarray = [];
        $i=1;
        foreach ($items as $keys => $item) {
          if($keys==0){
            foreach ($item as $key => $value) {
              $subarray[$i] = $value;
              $i++;
            }
          }
          else {
              $subarray[$i]= $item;
              $i++;
            }
            $subarray[$i]="OBR";
            $i++;
        }
        array_pop($subarray);
      $array[$order]=$subarray;
      unset($subarray);
      }
      return $array;
    }
    public function orderValue(){
      // $array = [];
      
    }
}
?>
