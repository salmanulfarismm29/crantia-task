<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pass = Hash::make('123456');

        $data = [['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => $pass]];

        foreach ($data as $item) {
            DB::table('users')->insert(['name' => $item['name'], 'email' => $item['email'], 'password' => $item['password']]);
        }
    }
}
