<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchOutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BranchOutlet::create([
            'outlet_id'=>'1',
            'branch_name'=>'Ottokopi pasar ambacang',
            'telp_number'=>'087651228662',
            'address'=>'Pasar Ambacang',
        ]);
    }
}
