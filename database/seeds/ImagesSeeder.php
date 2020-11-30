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
            'imagePath' => '/src/common/images/1',
        ]);

        DB::table('images')->insert([
            'galleryId' => 2,
            'imagePath' => '/src/common/images/2',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => '/src/common/images/4',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => '/src/common/images/5',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => '/src/common/images/6',
        ]);

        DB::table('images')->insert([
            'galleryId' => 3,
            'imagePath' => '/src/common/images/7',
        ]);

        DB::table('images')->insert([
            'galleryId' => 4,
            'imagePath' => '/src/common/videos/4',
        ]);
    }
}
