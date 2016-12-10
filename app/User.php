<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Account;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', /*'phone_number', 'name', 'surname', 'country', 'city', 'post_number', 'house_number', 'gender',*/
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return all the accounts the user has access to.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    /**
     * All the transactions the user has made.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    /**
     * Sum up all the available funds the user has (throughout his bank accounts).
     * @return int
     */
    public function balance()
    {
        return $this->accounts->reduce(function ($acc, $account) {
            return $acc + $account->balance;
        }, 0);
    }

    /**
     * The model field name that will be used to look up records in the database.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
