<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Expense extends Model
{

      use Notifiable;
   protected $fillable=['driver_id' ,
         'expense_type',
         'expense_country',
         'expense_invoice', 
         'expense_price', 
         'expense_date',
         'created_at',
         'updated_at'
      ];
}
