<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

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
    protected $fillable = ['name','status','group_user'];
    protected $appends = ['count'];

    public function getcountAttribute()
    {
        return EmailUser::where('group_id',$this->id)->count();
    }

    public function groupEmails()
    {
        return $this->hasMany(EmailUser::class,'group_id','id');
    }

    
}
