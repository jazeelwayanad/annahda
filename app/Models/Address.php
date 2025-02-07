<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'country',
        'phone_number',
        'address',
        'city',
        'state',
        'pincode',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
