<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('category')->truncate();
        DB::table('category')->insert([
            'tagId' => 5,
            'categoryName' => 'Hamburguesas'
        ]);

        DB::table('category')->insert([
            'tagId' => 5,
            'categoryName' => 'Comida mexicana'
        ]);

        DB::table('category')->insert([
            'tagId' => 5,
            'categoryName' => 'Pastas'
        ]);

        DB::table('category')->insert([
            'tagId' => 1,
            'categoryName' => 'Vegetación'
        ]);

        DB::table('category')->insert([
            'tagId' => 1,
            'categoryName' => 'Plaza comercial'
        ]);

        DB::table('category')->insert([
            'tagId' => 2,
            'categoryName' => '2 estrellas'
        ]);

        DB::table('category')->insert([
            'tagId' => 2,
            'categoryName' => '5 estrellas'
        ]);
    }
}
