<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::insert([
            'name' => 'Admin HD',
            'account' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'duchoaikevin279@gmail.com',
            'role' => 1
        ]);
    }
}
