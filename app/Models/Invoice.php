<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'issue_date',
        'subscription_id',
        'plan_id',
        'user_id',
        'price',
        'discount',
        'tax',
        'sub_total',
        'total',
        'payment_id',
        'invoice_id',
        'method',
        'status',
        'pdf_url'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
