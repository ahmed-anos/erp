<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstallmentStatus extends Model
{
    protected $fillable=[
        'client_id',
        'status',
        'responsible_person'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
