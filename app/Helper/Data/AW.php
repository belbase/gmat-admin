<?php
namespace App\Helper\Data;
use \App\Model\Questions;
/**
 * This Helper Helpes the Question Fourm to save the Quewstion via AJAX Request
 * @package EduShastra Online Mock Test
 * @author Deepak Belbase
 */
class AW
{
  public static function save($request)
  {
    $table = new Questions;
    $data= $request->all();
    $table->title = $data['title'];
    $table->passage= $data['question'];
    $table->sec_id=2;
    $table->status=1;
    $table->save();
    return "Saved to Analytical Working Assignment Table";
  }
  public static function update($request)
  {
    $data = $request->all();
    $table = Questions::findorfail($data['id']);
    $table->qid = $data['id'];
    $table->title = $data['title'];
    $table->passage= $data['question'];
    $table->save();
    return "Updated to Analytical Working Assignment Table";
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
