<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = 
        [
            'contest_id',
            'user_id',
            'amount',
            'create_date',
            'currency',
            'status',
            'method',
            'order_id',
            'payment_id',
        ];
}
