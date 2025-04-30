<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
