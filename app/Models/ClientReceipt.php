<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReceipt extends Model
{
    protected $fillable=[
        'client_id',
        'document_number',
        'date',
        'type',
        'description',
        'money',
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
