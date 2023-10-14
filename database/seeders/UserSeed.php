<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'email' => 'Ezzat@gmail.com',
            'password' => Hash::make('123456'),
            'type' => 'Admin',
            'random_number' => random_int(10000, 99999),
        ]);
    }
}
