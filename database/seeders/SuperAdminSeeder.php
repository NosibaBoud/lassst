<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name'=>'super admin',
            'email'=>'super@gmail.com',
            'password'=>Hash::make('12345678'),
            'phone_number'=>'0917741342',
            'role'=>'superadmin',

        ]);
    }
}
