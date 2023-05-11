<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //delete current data user
        User::truncate();
        //create new admin
        $admin = User::create([
            'name' => 'Admin Full House',
            'email' => 'fullhouseteam01@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);
        //create new user
        $user = User::create([
            'name' => 'FPT Aptech',
            'email' => 'vinhlong505@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 2
        ]);
    }
}
