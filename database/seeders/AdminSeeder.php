<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@ldxelevator.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('ChangeMe123!'),
            ]
        );
    }
}