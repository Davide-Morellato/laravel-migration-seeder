<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Trains;
use Illuminate\Support\Facades\DB;

class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        DB::table('trains')->truncate(); //per non generare nuovi valori

        $company=['Italo', 'Trenitalia'];

        for($i = 0; $i < 10; $i++){
            $train = new Trains();

            $train -> company = $faker->randomElement($company);

            $train -> departure_trains_station = $faker->city();
            // if(!$train -> departure_trains_station){
            //     $train -> arrival_trains_station = $faker->city();
            // };

            do{
                $train -> arrival_trains_station = $faker->city();
            }while($train -> departure_trains_station === $train -> arrival_trains_station);
            
            $train -> departure_time = $faker->dateTimeBetween('now', '+1 day');
            $train -> arrival_time = $faker->dateTimeInInterval($train -> departure_time, '+1 day');

            $train -> train_code = $faker->numberBetween(1000, 9999);
            $train -> coaches_numbers = $faker->numberBetween(3, 11);

            $train -> on_time = $faker->boolean();
            if($train -> on_time === true){
                $train -> deleted = false;
            }else{
                $train -> deleted = $faker->boolean();
            }

            $train -> save();
        }


    }
}
