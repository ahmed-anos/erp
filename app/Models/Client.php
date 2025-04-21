<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'name' ,
        'country' ,
        'car' ,
        'installment' ,
        'start_installment',
        'end_installment',
        'installments_count',
        'indebtedness',
        'paid',
        'remaining',
        'interest',
        'interest_rate',
        'delayed_months',
        'updated_at',
        'created_at'
            ];

}
