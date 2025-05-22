<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'tahashehzad063@gmail.com',
            'password' => Hash::make('admin'),  
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
