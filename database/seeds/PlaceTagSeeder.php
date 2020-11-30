<?php

use Illuminate\Database\Seeder;

class PlaceTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('placeTag')->truncate();
        DB::table('placeTag')->insert([
            'touristicPlaceId' => 1,
            'tagId' => 1,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 1,
            'tagId' => 2,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 1,
            'tagId' => 3,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 1,
            'tagId' => 4,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 4,
            'tagId' => 2,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 2,
            'tagId' => 1,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 3,
            'tagId' => 1,
        ]);

        //Eventos
        DB::table('placeTag')->insert([
            'touristicPlaceId' => 5,
            'tagId' => 4,
        ]);

        DB::table('placeTag')->insert([
            'touristicPlaceId' => 6,
            'tagId' => 2,
        ]);
    }
}
