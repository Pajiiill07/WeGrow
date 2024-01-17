<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Customer::factory(5)->create();
        \App\Models\Admin::factory(5)->create();
        \App\Models\Outlet::factory(5)->create();
        \App\Models\BranchOutlet::factory(5)->create();
        \App\Models\Desk::factory(5)->create();
        \App\Models\Menu::factory(5)->create();
        \App\Models\Order::factory(5)->create();
        \App\Models\Reservation::factory(5)->create();
        \App\Models\Payment::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
