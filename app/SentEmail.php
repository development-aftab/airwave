<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SentEmail extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sent_emails';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['campaign_id','group_id', 'from', 'to', 'subject', 'body'];

    public function group()
    {
        return $this->hasOne(Group::class,'id','group_id');
    }

    public function campaign()
    {
        return $this->hasOne(Campaign::class,'id','campaign_id');
    }
    
}
