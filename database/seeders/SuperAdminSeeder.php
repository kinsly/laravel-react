<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Kinsa super admin', 
            'email' => 'root@gmail.com',
            'password' => Hash::make('920720455')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'runali admin', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('920720455')
        ]);
        $admin->assignRole('Admin');
    }
}
