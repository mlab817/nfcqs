<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'office' => 'IPD',
            'full_name' => 'Mark Lester A. Bolotaolo',
            'password' => Hash::make('password'),
            'email' => 'mlab817@gmail.com'
        ]);
    }
}
