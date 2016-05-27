<?php

use Illuminate\Database\Seeder;

class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
       public function run()
    {
        DB::table('flights')->insert([
            'user_id'=>str_random(5),
            'name' => str_random(5),
            'destination' => str_random(5),
            'airline' => str_random(5),
            
        ]);
    }
    
}
