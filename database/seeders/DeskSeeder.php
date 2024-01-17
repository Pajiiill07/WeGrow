<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Desk::create([
            'no_desk'=>'01',
            'capacity'=>'2',
            'lokasi_meja'=>'indoor',
            'file_upload'=>'/images/ottokopi.png',
            'branch_id' => '4'
        ]);
    }
}
