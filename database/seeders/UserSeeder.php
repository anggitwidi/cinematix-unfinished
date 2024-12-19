<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'=>'admin',
            'name'=> 'anggit',
            'password'=>bcrypt('admin123'),
            'birthdate'=>'1995-04-13',
            'balance'=>500000,
        ]);
    }
}
