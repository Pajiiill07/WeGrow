<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Payment::create([
            'reserve_id'=>'1',
            'amount'=>'56000',
            'payment_methode'=>'bank transfer',
            'payment_date'=>now(),
            'status'=>'pembayaran dp'
        ]);
    }
}
