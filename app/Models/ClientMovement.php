<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMovement extends Model
{
    protected $fillable=[
        'client_id',
        'document_number',
        'date',
        'expense',
        'expense_price',
        'description',
        'driver',
        'images'
    ];

    protected $casts=[
        'images'=>'array'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
