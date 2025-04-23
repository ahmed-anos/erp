<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Context;
use Livewire\Component;

class ClientAccount extends Component
{
    public $start_date;
    public $end_date;
    public $code = '';
    public $showSuggestions = false;
    public $client_name;
    public $suggestedClients = [];
    
    public $movements;
    public $receipt;

    public $account_details=[];
    public function updatedCode($value)
    {
        if (strlen($value) >= 1) {
            $this->suggestedClients = Client::where('code', 'like', "%{$value}%")
                ->orWhere('name', 'like', "%{$value}%")
                ->limit(10)
                ->get();
            $this->showSuggestions = true;
          
        } else {
            $this->suggestedClients = [];
            $this->showSuggestions = false;
        }
    }
    
    public function selectClient($selectedCode, $selectedName)
    {
        $this->code = $selectedCode;
        $this->client_name=$selectedName;
        $this->showSuggestions = false;
    }
    


    public function getDetails()
    {
        if ($this->code) {
            $client = Client::where('code', $this->code)->first();
          
    $movements = $client->movements->map(function ($item) {
        return [
            'type' => 'movement',
            'date' => $item->date,
            'document_number' => $item->document_number,
            'description' => $item->description,
            'expense' => $item->expense,
            'amount' => $item->expense_price,
        ];
    });

    $receipts = $client->receipts->map(function ($item) {
        return [
            'type' => 'receipt',
            'date' => $item->date,
            'document_number' => $item->document_number,
            'description' => $item->description,
            'expense' => $item->type,
            'amount' => -1 * $item->money, // بالسالب عشان نخصمه من المصروفات
        ];
    });

    // دمج وترتيب حسب التاريخ
    $this->account_details = collect($movements)->merge($receipts)->sortBy('date')->values();
            
        }
    }
  
    public function render()
    {
    return view('livewire.client.client-account', [
        'account_details' => $this->account_details,
    ])->extends('master');
}
}