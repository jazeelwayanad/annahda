<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'billing_address',
        'shipping_address',
        'razorpay_subscription_id',
        'status',
        'expiry_date',
        'start_date',
        'end_date',
        'total_count',
        'paid_count',
        'short_url',
        'razorpay_offer_id',
        'price',
        'discount',
        'tax',
        'sub_total',
        'total',
        'coupon_id',
        'expired_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function billing_address()
    {
        return $this->belongsTo(Address::class, 'billing_address');
    }
    public function shipping_address()
    {
        return $this->belongsTo(Address::class, 'shipping_address');
    }
    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }
}
