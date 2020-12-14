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
            'tagName' => 'Plazas',
            'tagFile' => 'Plazas.jpg'
        ]);

        DB::table('tag')->insert([
            'tagName' => 'Hoteles',
            'tagFile' => 'Hoteles.jpg'
        ]);
        DB::table('tag')->insert([
            'tagName' => 'Parques',
            'tagFile' => 'Parques.jpg'
        ]);
        DB::table('tag')->insert([
            'tagName' => 'Lugar historico',
            'tagFile' => 'Lugar historico.jpg'
        ]);
    }
}
