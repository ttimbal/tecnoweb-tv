<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('days')->insert(
                 ['name' => "Lunes"]
             );

             Day::create([
                 "name"=>"Martes"
             ]);

             Day::create([
                 "name"=>"Miércoles"
             ]);

             Day::create([
                 "name"=>"Jueves"
             ]);

             Day::create([
                 "name"=>"Viernes"
             ]);

             Day::create([
                 "name"=>"Sabado"
             ]);

             Day::create([
                 "name"=>"Domingo"
             ]);
    }
}
