<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'limit', 'balance', 'limit_approved_until', 'fallback_account',
    ];

    public static function createPrimary(User $user)
    {
        Account::create([
            'name' => 'Primarni račun',
            'user_id' => $user->id
        ]);
    }

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
     * All the transactions the account has had.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    /**
     * An account fallback's to another account.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fallbackAccount()
    {
        return $this->belongsTo('App\Account', 'fallback_account');
    }

    /**
     * Change the balance of an account through a transaction.
     * @param $transaction
     */
    public function makeTransaction($transaction)
    {
        if($transaction->method == false)
        {
            $this->balance -= $transaction->amount;
        }
        else
        {
            $this->balance += $transaction->amount;
        }
        $this->save();
    }
}
