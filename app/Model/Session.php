<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
  /**
   * the table assosiated with model
   *
   * @var string table
   */
    protected $primaryKey="refid";
    public $timestamps = false;
    protected $table="session";

  public function question()
   {
       return $this->hasOne('App\Model\Questions','qid','qid');
   }
   public function user()
   {
     return $this->hasOne('App\User','id','uid');
   }
}
