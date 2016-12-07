<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    private $owner, $groupMembers;

    /**
     * Get the account's owner
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Get the account's group members
     * @return array
     */
    public function getGroupMembers()
    {
        return $this->groupMembers;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'balance', 'limit', 'limit_approved_until',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
