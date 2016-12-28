<?php

namespace App;

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
        return $this->users()->pluck('id')->all();
    }
}
