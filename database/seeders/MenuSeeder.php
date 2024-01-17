<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Menu::create([
            'menu_name'=>'Matcha Latte',
            'description'=>'afnisgf asncjnsdjbcsk',
            'price'=>'28000',
            'branch_id'=>'1',
        ]);
    }
}
