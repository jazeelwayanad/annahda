<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class journal extends Model
{
    protected $fillable = [
        'type',
        'date',
        'particular',
        'amount',
        'attachment',
    ];
}
