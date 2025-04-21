<?php

namespace App\Livewire\Client;

use Illuminate\Support\Facades\Context;
use Livewire\Component;

class ClientTransactions extends Component
{
    public function mount(){
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('client.transaction') ,'label'=>'حركه العملاء']);
    }

    public function addTransaction(){
        
    }
    public function render()
    {
        return view('livewire.client.client-transactions')->extends('master');
    }
}
