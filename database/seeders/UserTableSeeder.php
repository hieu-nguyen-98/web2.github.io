<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        //admin
            [
                'full_name' => 'Hieu Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1111'),
                'role' => 'admin',
                'status' => 'active',
            ],
        //vendor
            [
                'full_name' => 'Hieu Seller',
                'username' => 'Seller',
                'email' => 'seller@gmail.com',
                'password' => Hash::make('1111'),
                'role' => 'seller',
                'status' => 'active',
            ],
        //customer
            [
                'full_name' => 'Hieu Custonmer',
                'username' => 'Custonmer',
                'email' => 'custoner@gmail.com',
                'password' => Hash::make('1111'),
                'role' => 'customer',
                'status' => 'active',
            ],
        ]);
    }
}
