<?php

namespace Database\Seeders;

use App\Models\Turn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turns')->insert(
            [
                "name"=>"mañana",
                "start_time"=>"06:00",
                "end_time"=>"11:59"

            ]);
        DB::table('turns')->insert(
            [
                "name"=>"tarde",
                "start_time"=>"12:00",
                "end_time"=>"17:59"

            ]);
        Turn::create([
            "name"=>"noche",
            "start_time"=>"18:00",
            "end_time"=>"11:59"
        ]);

    }
}
