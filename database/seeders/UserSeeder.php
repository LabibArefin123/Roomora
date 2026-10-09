<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'mdlabibarefin@gmail.com'],
            [
                'name' => 'Md. Labib Arefin',
                'phone' => '01776197999',
                'address' => 'Radisson Blu Dhaka Water Garden, Airport Road, Dhaka, Bangladesh',
                'password' => Hash::make('AAaa00@@'),
            ]
        );
    }
}
