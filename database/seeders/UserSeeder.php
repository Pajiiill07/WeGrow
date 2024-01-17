<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'username'=>'pajiilll',
            'email'=>'pajiilllalala@gmail.com',
            'email_verified_at'=> now(),
            'password'=>'07072027',
            'remember_token' => '6U75qR8c'
        ]);
    }
}
