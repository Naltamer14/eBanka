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
        'name', 'user_id', 'limit', 'balance', 'limit_approved_until', 'fallback_account',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * An account can have many accounts that fallback to it
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fallbackAccounts()
    {
        return $this->hasMany('App\Account', 'fallback_account');
    }

    /**
     * An account fallback's to another account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fallbackAccount()
    {
        return $this->belongsTo('App\Account', 'fallback_account');
    }
}
