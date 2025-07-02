<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function getPriceInWords(int $number): string
    {
        $words = array(
            0 => 'zero', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight',
            9 => 'nine', 10 => 'ten', 11 => 'eleven',
            12 => 'twelve', 13 => 'thirteen', 
            14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty',
            90 => 'ninety'
        );
    
        if ($number < 20) {
            return $words[$number];
        }
    
        if ($number < 100) {
            return $words[10 * floor($number / 10)] .
                   ' ' . $words[$number % 10];
        }
    
        if ($number < 1000) {
            return $words[floor($number / 100)] . ' hundred ' 
                   . self::getPriceInWords($number % 100);
        }
    
        if ($number < 1000000) {
            return self::getPriceInWords(floor($number / 1000)) .
                   ' thousand ' . self::getPriceInWords($number % 1000);
        }
    
        return self::getPriceInWords(floor($number / 1000000)) .
               ' million ' . self::getPriceInWords($number % 1000000);
    }

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

    public function casts(): array
    {
        return [
            'issue_date' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
