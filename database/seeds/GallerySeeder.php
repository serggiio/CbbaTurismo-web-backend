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
        /*DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Galeria presentacion',
            'galleryPath' => 'images/places/1/galleries/1',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Galeria presentacion 2',
            'galleryPath' => 'images/places/1/galleries/2',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Evento 3 de noviembre',
            'galleryPath' => 'images/places/1/galleries/3',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 1,
            'galleryName' => 'Evento 4 de noviembre',
            'galleryPath' => 'images/places/1/galleries/4',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 2,
            'galleryName' => 'Galeria evento 18',
            'galleryPath' => 'images/places/2/galleries/5',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 3,
            'galleryName' => 'Galeria presentacion3',
            'galleryPath' => 'images/places/3/galleries/6',
        ]);

        DB::table('gallery')->insert([
            'touristicPlaceId' => 4,
            'galleryName' => 'Galeria presentacion4',
            'galleryPath' => 'images/places/3/galleries/7',
        ]);*/
    }
}
