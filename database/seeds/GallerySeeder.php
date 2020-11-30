<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('gallery')->truncate();
        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Galeria presentacion',
            'galleryPath' => '/src/common/gallery/1/Galeria1',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Galeria presentacion 2',
            'galleryPath' => '/src/common/gallery/1/Galeria1',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Evento 3 de noviembre',
            'galleryPath' => '/src/common/gallery/1/Galeria1',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Evento 4 de noviembre',
            'galleryPath' => '/src/common/gallery/1/Galeria1',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 2,
            'galleryName' => 'Galeria evento 18',
            'galleryPath' => '/src/common/gallery/2/Galeria2',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 3,
            'galleryName' => 'Galeria presentacion3',
            'galleryPath' => '/src/common/gallery/4/Galeria4',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 4,
            'galleryName' => 'Galeria presentacion4',
            'galleryPath' => '/src/common/gallery/4/Galeria4',
        ]);
    }
}
