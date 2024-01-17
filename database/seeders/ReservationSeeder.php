<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Reservation::create([
            'reserve_date' => now(),
            'reserve_time' => now(),
            'num_visitors' => '4',
            'meja_id' => '1',
            'branch_id' => '1',
            'customer_id' => '1'
        ]);
    }
}
