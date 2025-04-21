<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable=['expense_id' ,'name' ,'date', 'expense_invoice'];
}
