<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\ClientReceipt;
use Livewire\Component;
use Livewire\WithFileUploads;

class Receipt extends Component
{

    use WithFileUploads;
    // public $code;
    public $document_number;
    public $date;
    public $money;
 
    public $description;
    public $type;
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
        'type' => 'required|string',
        'money' => 'required|numeric',
        'description' => 'nullable|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
    ];

    

   

  
    public function addReceipt(){
         $this->validate();
         $imagePaths = [];
    if ($this->images) {
        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('documents', 'public'); 
        }
    }

    $client_id = Client::where('code', $this->code)->first();
    $client=ClientReceipt::create([
        'client_id'=>$client_id->id,
        'document_number' => $this->document_number,
        'date' => $this->date,
        'type' => $this->type,
        'description' => $this->description,
        'money' => $this->money,
        'images' => !empty($imagePaths) ? json_encode($imagePaths) : null,
    ]);
  
    $lastPaymentDate = $client_id->last_payment_date; // يمكنك تخزين تاريخ آخر دفعة في جدول العميل
    $currentDate = now();
    $delayMonths = $lastPaymentDate ? $currentDate->diffInMonths($lastPaymentDate) : 0;

    // حساب إجمالي التأخير
    $totalDelay = $delayMonths * $this->money; // فرضًا أن المبلغ المتأخر هو المبلغ المدفوع في السند

    $client_id->paid += $this->money;
    $client_id->remaining -= $this->money; 
    $client_id->delayed_months = $delayMonths;

    // $client_id->last_payment_date = $this->date; 
    $client_id->save();

    $this->code='';
    $this->document_number='';
    $this->date='';
    $this->money='';
    $this->description='';
    $this->images='';

    flash()->success( 'تم إضافة القبض بنجاح!');
    }
    public function render()
    {
        return view('livewire.receipt')->extends('master');
    }
}
