<?php

namespace App\Http\Controllers;

use App\Exports\ExpenseExport;
use App\Exports\OneExpenseExport;
use App\Models\Attachment;
use App\Models\Driver;
use App\Models\Expense;
use App\Notifications\ExpenseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseController extends Controller 
{
    public function index(){
        // $allExpenses=Expense::paginate(15);

        Context::push('breadcrumbs' ,['url'=>route('dashboard') ,'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('expense.index') ,'label'=>'المصروفات']);
        $allExpenses= DB::select('SELECT 
            expenses.id,
            expenses.expense_date,
            expenses.expense_price,
            expenses.expense_type,
            expenses.expense_country,
            -- expenses.expense_invoice,
            drivers.phone,
            drivers.name
        FROM 
            expenses
        INNER JOIN 
            drivers 
        ON 
    expenses.driver_id = drivers.id;');
    // dd($allExpenses);
    $allDrivers=Driver::all();
    // will be paginate
        return view('backend.expenses.expense_list' ,['allExpenses'=>$allExpenses ,'allDrivers'=>$allDrivers]);
    }

    public function create(){

    Context::push('breadcrumbs' ,['url'=>route('dashboard') , 'label'=>'الصفحه الرئيسيه']);
    Context::push('breadcrumbs' ,['url'=>route('expense.create') , 'label'=>'ادخال المصاريف']);
        $allDrivers= Driver::all();
        return view('backend.expenses.expense_from' ,compact('allDrivers'));
    }

    public function store(Request $request){
        $request->validate([
            'driver_id'=>'required|max:100',
            'expense_type'=>'required',
            'expense_country'=>'required',
            'expense_price'=>'required|numeric',
            'expense_date'=>'required',
            'expense_invoice' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
        ]);
      
        
        $expense=Expense::create($request->only(['driver_id' ,'expense_type','expense_country' ,'expense_price', 'expense_date' ,'expense_invoice']));
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
       

    //     $user = Auth::user(); // المستخدم الحالي الذي سجل المصروف
    // $user->notify(new ExpenseNotification($expense));

    // إعادة توجيه مع رسالة نجاح
    // return back()->with('success', 'تم تسجيل المصروف وإرسال الإشعار!');
        return redirect('expense')->with('success' ,'تم اضافه المصروف بنجاح');
    }

    public function show(Request $request){
        $driverExpenses = DB::table('expenses')
    ->join('drivers', 'expenses.driver_id', '=', 'drivers.id')
    ->where('drivers.id', $request->id)
    ->select('expenses.expense_date', 'expenses.expense_price','expenses.expense_country' ,'expenses.expense_type', 'drivers.phone', 'drivers.name')
    ->get();

        $allDrivers= Driver::all();
        return view('backend.expenses.searchExpense' ,['allDrivers'=>$allDrivers ,'driverExpenses'=>$driverExpenses ,'driver_id'=>$request->id]);
    }

    public function edit($id){
        $expense=Expense::where('id' ,$id)->first();
        return view('backend.expenses.expense_update' ,compact('expense'));

    }

    public function update(Request $request ,$id){
        Context::push('breadcrumbs' ,['url'=>route('dashboard') , 'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('expense.index') , 'label'=>'المصاريف']);
        Context::push('breadcrumbs' ,['url'=>route('expense.update') , 'label'=>'معلومات المصروف']);
       
        Expense::where('id' ,$id)->update([
            'expense_country'=>$request->expense_country,
            'expense_type'=>$request->expense_type,
            'expense_price'=>$request->expense_price,
            'expense_date'=>$request->expense_date,
        ]);
        return to_route('expense.index')->with('success' ,'تم تعديل المصروف بنجاح');
    }
    // Search by date 
    public function searchDate(Request $request){
        $dateExpenses=DB::table('expenses')
        ->join('drivers', 'expenses.driver_id', '=', 'drivers.id')
        ->where('expenses.expense_date' , $request->first_date)
        ->select('expenses.expense_date', 'expenses.expense_price','expenses.expense_country' ,'expenses.expense_type', 'drivers.phone', 'drivers.name')
        ->get();
        $allDrivers= Driver::all();
        return view('backend.expenses.searchExpense' ,['allDrivers'=>$allDrivers ,'driverExpenses'=>$dateExpenses ,'driver_id'=>$request->id]);
        
    }

    public function total(){
        Context::push('breadcrumbs' ,['url'=>route('dashboard') , 'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('expense.total') , 'label'=>'اجمالي المصاريف']);
       
        $totals = Expense::select('expense_country')
        ->selectRaw('SUM(expense_price) as total_expense')
        ->groupBy('expense_country')
        ->get();
        return view('backend.expenses.total' , compact('totals'));
    }

    public function country($country){
        $country_search=DB::table('expenses')
        ->join('drivers', 'expenses.driver_id', '=', 'drivers.id')
        ->where('expenses.expense_country' , $country)
        ->select('expenses.expense_date', 'expenses.expense_price','expenses.expense_country' ,'expenses.expense_type', 'drivers.phone', 'drivers.name')
        ->get();
        
        // $country_search=Expense::where('expense_country' ,$country)->get();
        return view('backend.expenses.country' , compact('country_search'));
    }

    public function details($id){

        Context::push('breadcrumbs' ,['url'=>route('dashboard') , 'label'=>'الصفحه الرئيسيه']);
        Context::push('breadcrumbs' ,['url'=>route('expense.index') , 'label'=>'المصاريف']);
        Context::push('breadcrumbs' ,['url'=>route('expense.details' ,$id) , 'label'=>'تفاصيل مصروف']);
        $expense=Expense::where('id' ,$id)->first();
        $attachments=Attachment::where('expense_id' ,$expense->id)->get();
        // dd($attachments);
        return view('backend.expenses.expense_detail' ,['expense'=>$expense ,'attachments'=>$attachments]);
    }

    public function destroy($id){
        Expense::where('id',$id)->delete();
        return to_route('expense.index')->with('success' ,'تم حذف المصروف بنجاح');
    }

    public function export() 
    {
        return Excel::download(new ExpenseExport, 'جميع المصاريف.xlsx');
    }

    public function exportOneExpense(Request $request){
        // dd(gettype($request->id));
        return Excel::download(new OneExpenseExport($request->id), 'مصروف.xlsx');
    }



// public function sendNotification()
// {
//     $user = Auth::user();
//     Notification::send($user, new ExpenseNotification());
// }
    // public function sendNotification()
    // {
    //     $user = Auth::user();
    //     if ($user) {
    //         $user->notify(new ExpenseNotification());
    //         return "تم إرسال الإشعار بنجاح!";
    //     }
    //     return "لم يتم العثور على المستخدم!";
    // }
    
}
