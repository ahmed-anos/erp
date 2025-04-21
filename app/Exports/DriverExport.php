<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DriverExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Driver::select('name' ,'phone' ,'country' ,'notice')->get();
    }
    public function headings(): array
    {
        return[
            'الاسم',
            'رقم الهاتف',
            'رقم العربيه',
            'الدوله',
            'ملاحظات'
        ];
    }
}
