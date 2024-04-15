<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin' ,
            'email' => 'kyawswe411@gmail.com',
            'phone' => '09762254984',
            'address' => 'Yangon',
            'role'    =>'admin',
            'gender'    =>'male',
            'password' => Hash::make('admin123')
        ]);
    }
}
