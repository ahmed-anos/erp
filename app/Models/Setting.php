<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Setting extends Model
{
    protected $fillable=['name' ,'owner' ,'activity','user' ,'logo','phone' ,'address' ,'tax_number'];
}