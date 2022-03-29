<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Member::factory(50)->create();
        \App\Models\Outlet::factory(20)->create();
        \App\Models\User::factory(25)->create();
        \App\Models\Paket::factory(300)->create();

        User::create([
            'nama' => 'Siti Zahra',
            'username' => 'admin1',
            'role' => 'admin',
            'email' => 'admin1@laundry.com',
            'password' => bcrypt('admin'),
            'outlet_id' => 2
        ]);
    }
}
