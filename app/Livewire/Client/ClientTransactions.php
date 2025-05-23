<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Models\ClientMovement;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Context;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientTransactions extends Component
{
    use WithFileUploads;
    // public $code;
    public $document_number;
    public $date;
    public $client;
    public $money;
    public $total;
    public $expense_total;
    public $expense;
    public $expense_price;
    public $description;
    public $driver;
    public $images;



    public $code = '';
public $showSuggestions = false;
public $suggestedClients = [];

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

public function selectClient($selectedCode)
{
    $this->code = $selectedCode;
    $this->showSuggestions = false;
}


    public function mount(){
       
    }

    protected $rules = [
        'code' => 'required|string',
        'document_number' => 'required|string|unique:client_movements',
        'date' => 'required|date',
        // 'client' => 'required|string',
        // 'money' => 'required|numeric',
        'expense' => 'required|string',
        'expense_price' => 'required|numeric',
        'description' => 'nullable|string',
        'driver' => 'nullable|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
    ];

    

   

  
    public function addTransaction(){
         $this->validate();
         $imagePaths = [];
    if ($this->images) {
        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('documents', 'public'); 
        }
    }

    $client_id = Client::where('code', $this->code)->first();
    ClientMovement::create([
        'client_id'=>$client_id->id,
        'document_number' => $this->document_number,
        'date' => $this->date,
        'expense' => $this->expense,
        'expense_price' => $this->expense_price,
        'description' => $this->description,
        'driver' => $this->driver,
        'images' => !empty($imagePaths) ? json_encode($imagePaths) : null,
    ]);

    $this->code='';
    $this->document_number='';
    $this->date='';
    $this->expense='';
    $this->expense_price='';
    $this->description='';
    $this->driver='';
    $this->images='';

    flash()->success( 'تم إضافة الحركة بنجاح!');
    }
    public function render()
    {
        return view('livewire.client.client-transactions')->extends('master');
    }
}
