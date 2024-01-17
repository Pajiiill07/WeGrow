<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Outlet::create([
            'outlet_name'=>'Ottokopi',
            'file_upload'=>'/images/ottokopi.png',
            'telp_number'=>'087654324662',
            'address'=>'Jl. Dr. Moh. Hatta No.wdniwhd',
        ]);
    }
}
