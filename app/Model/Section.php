<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  /***
    * the table assosiated with model
    *
    * @var string table
    */
    // protected $primaryKey="refid";
    //  public $timestamps = false;
    protected $table="section";
    /**
    * Get the question that own a section.
    */
    public function questions()
    {
        return $this->belongsTo('App\Model\Questions','id','sec_id');
    }
}
