<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{

  /**
   * the table assosiated with model
   *
   * @var string table
   */
  protected $table="questions";

  /**
   * the primary key assosiated with model.
   *
   * @var string primaryKey
   */
  protected $primaryKey = 'qid';

   /**
    * Get the options for the multiple choice questions.
    *
    * @return object options
    */
   public function options()
   {
       return $this->hasMany('App\Model\Options', 'qid', 'qid');
   }

    /**
     * Get the section for the blog post.
     *
     * @return object section
     */
    public function section()
    {
        return $this->hasOne('App\Model\Section','id','sec_id');
    }

    /**
     * Get the passage assosiated with model.
     *
     * @return object passage
     */
    public function passage(){
      return $this->hasOne('App\Model\Passage', 'pid', 'pid');
    }

    /**
     * Get the options for the multiple choice questions.
     *
     * @return object session
     */
    public function session(){
      return $this->belongsTo('App\Model\Session','qid','qid');
    }
}

 ?>
