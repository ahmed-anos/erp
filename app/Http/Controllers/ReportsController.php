<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function allDrivers(){
        $allDrivers=Driver::paginate(15);
        return view('backend.reports.all_drivers' ,['allDrivers'=>$allDrivers]);
    }
    public function allExpenses(){
        $allExpenses=DB::select('SELECT 
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
        return view('backend.reports.all_expenses' ,['allExpenses' => $allExpenses]);
    }

    public function dailyExpenses(){
        $today = Carbon::now()->toDateString(); 

        $allExpenses = DB::table('expenses')
            ->join('drivers', 'expenses.driver_id', '=', 'drivers.id') 
            ->select(
                'expenses.expense_date',
                'expenses.expense_price',
                'expenses.expense_type',
                'expenses.expense_country',
                // 'expenses.expense_invoice',
                'drivers.phone',
                'drivers.name'
            )
            ->whereDate('expenses.expense_date', $today) 
            ->get();
        return view('backend.reports.all_expenses' ,['allExpenses' => $allExpenses]);
    }

    public function totalExpenses(){
        $allExpenses=DB::select('SELECT 
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
        return view('backend.reports.total_expenses' ,['allExpenses' => $allExpenses]);
    }
}
