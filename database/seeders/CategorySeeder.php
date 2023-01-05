<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
                 "name"=>"Novela"
             ]);

             Category::create([
                 "name"=>"Deporte"
             ]);

             Category::create([
                 "name"=>"Juvenil"
             ]);

             Category::create([
                 "name"=>"Espectáculos"
             ]);

             Category::create([
                 "name"=>"Informativo"
             ]);

             Category::create([
                 "name"=>"Entretenimiento"
             ]);
    }
}
