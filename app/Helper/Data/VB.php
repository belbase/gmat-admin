<?php
namespace App\Helper\Data;
use \App\Model\Questions;
/**
 * This Helper Helpes the Question Fourm to save the Question via AJAX Request
 * @package EduShastra Online Mock Test
 * @author Deepak Belbase
 */
class VB
{
  public static function save($request)
  {
    $data = $request->all();
    $table = new Questions;
    $table->title = $data['title'];
    $table->passage= $data['question'];
    $table->cat =$data['cata'];
    $table->dif = $data['dif'];
    $table->sec_id=4;
    $table->status=1;
    if(!empty($data['statement'])) $table->statement=$data['statement'];
    if(isset($data['type'])) $table->type=$data['type'];
    // $array= [];
    $table->save();
      foreach($data['option'] as $value) {
            if(!empty($value['option']['content']))
              $table->options()->create([
                'content'=>$value['option']['content'],
                'is_correct'=>($value['option']['is_correct'] == 'true')?1:0,
              ]);
              // var_dump($value['option']['is_correct']);
      }
      // $table->options()->createMany($array);
    $table->save();
    return "Saved to Verbal Table";
  }
  public static function update($request)
  {
    $data = $request->all();
    $table = Questions::findorfail($data['id']);
    $table->title = $data['title'];
    $table->passage= $data['question'];
    $table->cat =$data['cata'];
    $table->dif = $data['dif'];
    if(!empty($data['statement'])) $table->statement=$data['statement'];
    else $table->statement=NULL;
    if(isset($data['type'])) $table->type=$data['type'];
      foreach($data['option'] as $value) {
        // var_dump($value);

        if(is_null($value['option']['oid'])){
          if(!empty($value['option']['content'])){
            $table->options()->create([
              'content'=>$value['option']['content'],
              'is_correct'=>($value['option']['is_correct'] == 'true')?1:0,
            ]);
          }
        }
        else{
          if(!empty($value['option']['content'])){
            $table->options()->where('oid','=',$value['option']['oid'])->update([
              'content'=>$value['option']['content'],
              'is_correct'=>($value['option']['is_correct'] == 'true')?1:0,
            ]);
          }
          else{
            $table->options()->where('oid','=',$value['option']['id'])->delete();
          }
        }

      }
    $table->save();
    return "Updated to Verbal Table";
  }
  public static function delete($request)
  {
    $data= $request->all();
    $table = Questions::findorfail($data['id']);
    $table->forceDelete();
    return "Deleted from Analytical Working Assignment Table";
  }
}


 ?>
