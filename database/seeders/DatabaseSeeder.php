<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin LibraGo',
            'username' => 'Admin',
            'email'    => 'admin@librago.com',
            'password' => Hash::make('password'),
            'role'     => 'admin'
        ]);
    }
}
