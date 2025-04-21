<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $owner = User::create([
            'name' => 'ahmed', 
            'email' => 'ahmed@mail.com',
            'password' => Hash::make('12345678'),
            // 'password_confirmation' => Hash::make('12345678')
        ]);
        $owner->assignRole('owner');

        // Creating Admin User
        $admin = User::create([
            'name' => 'ali', 
            'email' => 'ali@mail.com',
            'password' => Hash::make('12345678'),
            // 'password_confirmation' => Hash::make('12345678')
        ]);
        $admin->assignRole('admin');

        // Creating Product Manager User
        $driver = User::create([
            'name' => 'alaa', 
            'email' => 'alaa@mail.com',
            'password' => Hash::make('12345678'),
            // 'password_confirmation' => Hash::make('12345678')
        ]);
        $driver->assignRole('driver');

        // Creating Application User
        $accountant = User::create([
            'name' => 'medo', 
            'email' => 'medo@mail.com',
            'password' => Hash::make('12345678'),
            // 'password_confirmation' => Hash::make('12345678')
        ]);
        $accountant->assignRole('accountant');
    }
}