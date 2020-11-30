<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('tag')->truncate();
        DB::table('tag')->insert([
            'tagName' => 'Plazas'
        ]);

        DB::table('tag')->insert([
            'tagName' => 'Hoteles'
        ]);
        DB::table('tag')->insert([
            'tagName' => 'Parques'
        ]);
        DB::table('tag')->insert([
            'tagName' => 'Lugar historico'
        ]);
    }
}
