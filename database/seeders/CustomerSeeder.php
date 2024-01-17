<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Customer::create([
            'user_id'=>'01',
            'full_name'=>'Fazila Surya A',
            'telp_number'=> '12',
            'address'=>'pokoknya disana',
        ]);
    }
}
