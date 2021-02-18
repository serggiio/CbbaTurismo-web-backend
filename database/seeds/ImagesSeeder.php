<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('images')->truncate();
        DB::table('images')->insert([
            'galleryId' => 1,
            'imagePath' => 'image1.jpg',
        ]);

        DB::table('images')->insert([
            'galleryId' => 2,
            'imagePath' => 'image2.jpg',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => 'image3.jpg',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => 'image4.jgp',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => 'image5.jpg',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => 'image6.jpg',
        ]);

        DB::table('images')->insert([
            'galleryId' => 4,
            'imagePath' => 'image7.jpg',
        ]);
    }
}
