<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'name' ,
        'code',
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
        // Guarantor
        'guarantor_name',
        'guarantor_phone',

    

        'updated_at',
        'created_at'
            ];

        public function asset()
        {
            return $this->hasOne(ClientAsset::class);
        }

        public function installments()
        {
            return $this->hasMany(InstallmentStatus::class);
        }

        public function receipts()
        {
            return $this->hasMany(ClientReceipt::class);
        }

        public function movements()
        {
            return $this->hasMany(ClientMovement::class);
        }

        public function getDelayMonthsAttribute()
{
    $start = \Carbon\Carbon::parse($this->start_installment);
    $today = \Carbon\Carbon::today();
    $months_should_pay = $start->diffInMonths($today);
    $paid_installments = floor($this->paid / $this->installment);
    return max((int) ($months_should_pay - $paid_installments), 0);
}

public function getDelayedAmountAttribute()
{
    return round($this->delay_months * $this->installment, 1);

}



}
