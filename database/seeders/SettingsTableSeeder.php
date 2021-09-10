<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'E-mart Online Shopping',
            'meta_description' => 'E-mart Online Shopping',
            'meta_keywords' => 'E-mart, Online Shopping, E-commerce Website',
            'logo' => 'frontend/img/lookcare-v2.png',
            'favicon' => '',
            'address' => 'Phuc Yen, Vinh Phuc',
            'email' => 'info@emart.com',
            'phone' => '0352621297',
            'fax' => '0152 21540 154',
            'footer' => 'Hieu Nguyen',
            'facebook_url' =>'',
            'twitter_url' =>'',
            'linked_url' =>'',
            'pinterest' =>'',
        ]); 
    }
}
