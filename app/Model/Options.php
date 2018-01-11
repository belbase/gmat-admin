<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class Options extends Model
{

  protected $table="options";
  protected $primaryKey = 'oid';
  public $timestamps = false;
  protected $fillable=['oid','content','is_correct',];
  /**
    * Get the question that owns the options.
    */
   public function questions()
   {
       return $this->belongsTo('App\Model\Questions','qid','qid');
   }
}

 ?>
