<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder as SeedersRolePermissionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'ahmed@mail.com',
    //         'password'=>bcrypt('11111111')
    //     ],
    // );
    $this->call([
        PermissionSeeder::class,
        RoleSeeder::class,
        // DefaultUserSeeder::class,
        SettingSeeder::class
    ]);

    $admin = User::create([
        'name'     =>'admin',
        'email'    =>'admain@mail.com',
        'password' => bcrypt('12345678'),
        'role'     =>'admin'
    ]);
    }
}
