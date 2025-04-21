<?php

namespace App\Livewire;

use App\Models\Account;
use Illuminate\Support\Facades\Context;
use Livewire\Component;

class AccountTree extends Component
{
    public $name;
    public $parent_id;
    public $type;
    public $code;

    // public function mount(){
    //     Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
    //     Context::push('breadcrumbs' ,['url'=>route('account.tree') ,'label'=>' دليل الحسابات ']);
    // }

    public $expandedMainTypes = [];
    public $expandedAccounts = [];
    
    public function toggleMain($type)
    {
        if (in_array($type, $this->expandedMainTypes)) {
            $this->expandedMainTypes = array_diff($this->expandedMainTypes, [$type]);
        } else {
            $this->expandedMainTypes[] = $type;
        }
    }
    
    public function toggle($accountId)
    {
        if (in_array($accountId, $this->expandedAccounts)) {
            $this->expandedAccounts = array_diff($this->expandedAccounts, [$accountId]);
        } else {
            $this->expandedAccounts[] = $accountId;
        }
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:accounts,code',
        ]);

        Account::create([
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'type' => $this->type,
            'code' => $this->code,
        ]);

        $this->reset(['name', 'parent_id', 'type', 'code']);

        flash()->success('تم إضافة الحساب بنجاح');
    }

    public function render()
    {
        $accounts = Account::with('children')->whereNull('parent_id')->get();
        return view('livewire.account-tree', compact('accounts'))->extends('master');
    }
}
