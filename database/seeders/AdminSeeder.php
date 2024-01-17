<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'username'=>'apuii',
            'email'=>'cilapuiii@gmail.com',
            'email_verified_at'=> now(),
            'password'=>'1234567',
            'remember_token' => '7P75qR8d'
        ]);
    }
}
