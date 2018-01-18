<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Passage extends Model
{
    /**
    * the table assosiated with model
    *
    * @var string table
    */
    protected $table="page";

    /**
     * the primary key assosiated with model
     *
     * @var string primary_key
     */
    protected $primaryKey = 'pid';

    /**
     * Get the question assosiated with model.
     *
     * @return object questions
     */
    public function questions()
    {
      return $this->belongsTo('App\Model\Questions','pid','pid');
    }
}
