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
        'name', 'user_id', 'type', 'limit', 'balance', 'limit_approved_until', 'fallback_account',
    ];

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
     * The user the account belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
     * Get the 'type' attribute.
     *
     * @return string
     */
    public function getAccountTypeAttribute()
    {
        switch($this->attributes['type'])
        {
            case 0:
                return 'Navadni';
            case 1:
                return 'Varčni';
            case 2:
                return 'Upokojitveni';
            case 3:
                return 'Zaklenjeni';
        }
    }

    /**
     * Change the balance of an account through a transaction.
     * @param $transaction
     */
    public function makeTransaction($transaction)
    {
        $this->balance += $transaction->amount;
        $this->save();
    }

    /**
     * Output a colored format of a balance
     *
     * @param $balance
     * @param string $classes
     * @return string
     * @internal param $positive
     *
     */
    public static function formatBalance($balance, $classes = '')
    {
        ($balance > 0) ? $positive = true : $positive = false;
        $amount = '€' . number_format(abs($balance), 2);
        if($positive)
        {
            return "<span class='text-success $classes'>+ $amount</span>";
        }
        else if($balance == 0)
        {
            return "<span class='text-warning $classes'>$amount</span>";
        }
        else
        {
            return "<span class='text-danger $classes'>- $amount</span>";
        }
    }

    /**
     * All available funds
     *
     * @return int|mixed
     */
    public function availableFunds()
    {
        if ($this->balance > 0)
            return $this->balance;
        else
            return 0;
    }
}
