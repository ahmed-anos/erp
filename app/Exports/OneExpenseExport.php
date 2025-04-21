<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OneExpenseExport implements FromQuery ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $driver_id;
    public function __construct($id)
    {
        $this->driver_id=$id;
    }
   

    public function query()
    {
        return Expense::query()
    ->join('drivers', 'expenses.driver_id', '=', 'drivers.id') 
    ->where('drivers.id', $this->driver_id)
    ->select(
        'expenses.expense_date',
        'expenses.expense_price',
        'expenses.expense_type',
        'drivers.phone',
        'drivers.name'
    );
    }
    public function headings(): array
    {
        return [
            "التاريخ",
            "السعر",
            "البيان",
            "رقم الهاتف",
            'اسم السائق',
            
            
            
            
        ];
    }
}
