<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;

class UserDriverController extends Controller
{
    public function index(){
        $expenses=Expense::where('driver_id', Auth::user()->driver_id)->get();
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('userDriver.index') ,'label'=>'المصروفات ']);
       
        return view('backend.user_driver.index', compact('expenses'));
    }

    public function create(){
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('userDriver.index') ,'label'=>'المصروفات ']);
        Context::push('breadcrumbs' ,['url'=>route('userDriver.create') ,'label'=>'تسجيل مصروف ']);
       
        return view('backend.user_driver.addExpense');
    }

    public function store(Request $request){

        $request->validate([
            'expense_type'=>'required',
            'expense_country'=>'required',
            'expense_price'=>'required|numeric',
            'expense_date'=>'required',
            'expense_invoice' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
        ]);

        Expense::create($request->only(['driver_id','expense_type','expense_country' ,'expense_price', 'expense_date' ,'expense_invoice']));
        $expense_id=Expense::latest()->first()->id;
        if($request->hasFile('expense_invoice')){
        $file_name = time() . '.' . $request->file('expense_invoice')->getClientOriginalExtension();
        $file = $request->file('expense_invoice');
        $destinationPath = public_path('expenses');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
    
        $file->move($destinationPath, $file_name);
            Attachment::create([
                'expense_id'=>$expense_id,
                'name'=>$file_name,
                'date'=>$request->expense_date,
                
            ]);
        }

        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('userDriver.index') ,'label'=>'المصروفات ']);
       
       $expenses=Expense::where('driver_id', $request->driver_id)->get();
        return view('backend.user_driver.index' ,compact('expenses'))->with('success' ,'تم اضافه المصروف بنجاح');
    }


    public function detail($expense){
        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('userDriver.index') ,'label'=>'المصروفات ']);
        Context::push('breadcrumbs' ,['url'=>route('userDriver.detail', $expense) ,'label'=>'تفاصيل المصروف ']);
       
        $expense=Expense::where('id',$expense)->first();
        $attachments=Attachment::where('expense_id' ,$expense->id)->get();
        return view('backend.user_driver.detail',['expense'=>$expense ,'attachments'=>$attachments]);
    }

    
}
