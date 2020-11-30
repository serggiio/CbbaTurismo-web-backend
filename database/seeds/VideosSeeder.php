<?php

use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('videos')->truncate();
        DB::table('videos')->insert([
            'galleryId' => 1,
            'videoName' => 'Video de presentacion',
            'videoPath' => '/src/common/videos/1',
            'mainVideo' => 'true',
        ]);

        DB::table('videos')->insert([
            'galleryId' => 1,
            'videoName' => 'Video de presentacion 2',
            'videoPath' => '/src/common/videos/2',
        ]);

        DB::table('videos')->insert([
            'galleryId' => 3,
            'videoName' => 'Video de presentacion 3',
            'videoPath' => '/src/common/videos/3',
        ]);

        DB::table('videos')->insert([
            'galleryId' => 4,
            'videoName' => 'Video de presentacion 4',
            'videoPath' => '/src/common/videos/4',
            'mainVideo' => 'true',
        ]);
    }
}
