<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
class Questions extends Model
{

  protected $table="questions";
  protected $primaryKey = 'qid';
  /**
    * Get the options for the multiple choice questions.
    */
   public function options()
   {
       return $this->hasMany('App\Model\Options', 'qid', 'qid');
   }
   /**
     * Get the section for the blog post.
     */
    public function section()
    {
        return $this->hasOne('App\Model\Section','id','sec_id');
    }
    
    public function session(){
      return $this->belongsTo('App\Model\Session','qid','qid');
    }
}

 ?>
