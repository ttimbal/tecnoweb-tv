<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Jose Luis Miranda",
            'email' => "jose@gmail.com",
            'phone_number' => "65890904",
            'date_of_birth' => "05-28-1998",
            'type' => "adm",
            'password' => Hash::make("12345678")
        ]);

        User::create([
            'name' => "Pedro Ramirez",
            'email' => "pedro@gmail.com",
            'phone_number' => "65880905",
            'date_of_birth' => "05-28-1995",
            'type' => "prod",
            'password' => Hash::make("12345678")
        ]);

        User::create([
            'name' => "Ronal Perez",
            'email' => "ronal@gmail.com",
            'phone_number' => "65880916",
            'date_of_birth' => "05-28-1998",
            'type' => "pres",
            'password' => Hash::make("12345678")
        ]);
    }
}
