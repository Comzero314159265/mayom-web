<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

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
    protected $fillable = ['user_id', 'team_id', 'member_role_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    public function member_role()
    {
        return $this->belongsTo('App\MemberRole');
    }
    
}
