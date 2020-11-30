<?php

use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('favorite')->truncate();
        DB::table('favorite')->insert([
            'userId' => 1,
            'touristicPlaceId' => 1
        ]);

        DB::table('favorite')->insert([
            'userId' => 1,
            'touristicPlaceId' => 2
        ]);

        DB::table('favorite')->insert([
            'userId' => 2,
            'touristicPlaceId' => 3
        ]);

        DB::table('favorite')->insert([
            'userId' => 1,
            'touristicPlaceId' => 3
        ]);
    }
}
