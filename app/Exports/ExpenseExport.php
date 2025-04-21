<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpenseExport implements FromQuery ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function query()
    {
        return Expense::query()
        ->join('drivers', 'expenses.driver_id', '=', 'drivers.id')
        ->select(
            'expenses.expense_date',
            'expenses.expense_price',
            'expenses.expense_type',
            'expenses.expense_country',
            'drivers.phone',
            'drivers.name'
        );
    }
    public function headings(): array
    {
        return [
            'تاريخ المصروف',
            'قيمة المصروف',
            'نوع المصروف',
            'مكان المصروف',
            'رقم الهاتف',
            'اسم السائق',

        ];
    }
}
