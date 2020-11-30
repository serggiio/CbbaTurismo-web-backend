<?php

use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('rate')->truncate();
        DB::table('rate')->insert([
            'userId' => 1,
            'touristicPlaceId' => 1,
            'puntuacion' => 5,
        ]);

        DB::table('rate')->insert([
            'userId' => 1,
            'touristicPlaceId' => 2,
            'puntuacion' => 3,
        ]);

        DB::table('rate')->insert([
            'userId' => 2,
            'touristicPlaceId' => 3,
            'puntuacion' => 5,
        ]);

        DB::table('rate')->insert([
            'userId' => 3,
            'touristicPlaceId' => 1,
            'puntuacion' => 5,
        ]);
    }
}
