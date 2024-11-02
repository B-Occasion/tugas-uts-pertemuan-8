<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the admin user already exists to prevent duplicates
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            User::create([
                'name' => 'eee',
                'email' => 'eee@gmail.com',
                'password' => Hash::make('eeeeeeee'), // Use a secure password
                'levels' => 'admin', // Make sure this matches your enum
            ]);
        }
    }
}
