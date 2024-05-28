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
        DB::table('trains')->truncate(); //per cancellare i dati nella tabella

        $companies=['Italo', 'Trenitalia'];

        for($i = 0; $i < 10; $i++){
            $new_train = new Trains();

            $new_train -> company = $faker->randomElement($companies);

            $new_train -> departure_trains_station = $faker->city();
            // if(!$train -> departure_trains_station){
            //     $train -> arrival_trains_station = $faker->city();
            // };

            do{
                $new_train -> arrival_trains_station = $faker->city();
            }while($new_train -> departure_trains_station === $new_train -> arrival_trains_station);
            
            $new_train -> departure_time = $faker->dateTimeBetween('now', '+1 day');
            $new_train -> arrival_time = $faker->dateTimeInInterval($new_train -> departure_time, '+1 day');

            $new_train -> train_code = $faker->numberBetween(1000, 9999);
            $new_train -> coaches_numbers = $faker->numberBetween(3, 11);

            $new_train -> on_time = $faker->boolean();
            if($new_train -> on_time === true){
                $new_train -> deleted = false;
            }else{
                $new_train -> deleted = $faker->boolean();
            }

            $new_train -> save();
        }


    }
}
