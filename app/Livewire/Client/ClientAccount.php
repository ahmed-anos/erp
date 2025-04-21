<?php

namespace App\Livewire\Client;

use Illuminate\Support\Facades\Context;
use Livewire\Component;

class ClientAccount extends Component
{
    public function mount(){
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('client.account') ,'label'=>'كشف حساب عميل ']);
    }

    public function render()
    {
        return view('livewire.client.client-account')->extends('master');
    }
}
