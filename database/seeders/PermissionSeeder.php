<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'التقارير',
            'جميع السائقين',
            'جميع المصروفات',
            'المصروفات اليوميه',
            'العملاء',
            'الاقساط',
            'طباعه',
            'ترحيل اكسيل',
            'قسط عميل',
            'اقساط الشهر القادم',
            'الاقساط المؤخره',
            'الاقساط المدفوعه',
            
            'السائقين',
            'ادخال سائق جديد',
            'استعلام عن السائق',
        
            'المصروفات',
            'ادخال مصروف جديد',
            'استعلام عن مصروف سائق',
            
            
            'المستخدمين',
            'اضافه مستخدم جديد',
            'تعديل مستخدم',
            'حذف مستخدم',

            'صلاحيات المستخدمين',
            'اضافه دور',
            'حذف دور',
            'تعديل صلاحيات مستخدم',
            'حذف صلاحيات مستخدم',


            
         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}