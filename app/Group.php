<?php

namespace App;

use Auth;
use Laratrust\LaratrustGroup;

class Group extends LaratrustGroup
{
    protected $fillable = [
        'name',
    ];

    /**
     * Get the accounts associated with the group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function accounts()
    {
        return $this->belongsToMany('App\Account')->withTimestamps();
    }

    public function getAccountListAttribute()
    {
        return $this->accounts()->pluck('id')->all();
    }

    public function getUserListAttribute()
    {
        // Check if group exists or is about to be created
        if(is_null($this->id))
        {
            // Check if route has a user
            if(\Route::current()->user) {
                // If group is about to be created, set the route's user as the default member
                return \Route::current()->user->id;
            } else {
                return null;
            }
        }
        else
        {
            return $this->users()->pluck('id')->all();
        }
    }
}
