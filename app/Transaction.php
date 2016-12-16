<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'user_id',
        'purpose',
        'amount',
        'ip_address',
        'transferred_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ip_address',
    ];

    /**
     * The attributes that should be handled as carbon dates.
     *
     * @var array
     */
    protected $dates = ['transferred_at'];

    /**
     * The user that had made the transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The account the transaction was made on.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    /**
     * Get the 'type' attribute.
     *
     * @return string
     */
    public function getTypeAttribute()
    {
        if($this->amount >= 0)
        {
            return 'Polog';
        }
        else
        {
            return 'Dvig';
        }
    }

    /**
     * Set the 'amount' attribute.
     * @param $value
     */
//    public function setAmountAttribute($value)
//    {
//        if($type == 0)
//        {
//            $this->attributes['amount'] = -$value;
//        }
//    }

    /**
     * All the already transferred transactions.
     *
     * @param $query
     */
    public function scopeTransferred($query)
    {
        $query->where('transferred_at', '<=', Carbon::now());
    }

    /**
     * All the not yet transferred transactions.
     *
     * @param $query
     */
    public function scopeUntransferred($query)
    {
        $query->where('transferred_at', '>=', Carbon::now());
    }

    /**
     * Set the 'transferred_at' attribute.
     *
     * @param $date
     */
    public function setTransferredAtAttribute($date)
    {
        $this->attributes['transferred_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * Get the 'transferred_at' attribute.
     *
     * @param $date
     * @return Carbon
     */
    public function getTransferredAtAttribute($date)
    {
        return Carbon::parse($date);
    }
}
