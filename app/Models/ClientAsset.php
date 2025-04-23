<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientAsset extends Model
{
    protected $fillable=[
            // Asset
            'asset_type',
            'asset_color',
            'asset_year',
            'asset_shase',
            'asset_format',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
