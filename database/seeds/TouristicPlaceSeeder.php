<?php

use Illuminate\Database\Seeder;

class TouristicPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('touristicPlace')->truncate();
        DB::table('touristicPlace')->insert([
            'provinceId' => 1,
            'userId' => 1,
            'placeStatusId' => 1,
            'description' => 'Descripcion para un lugar turistico',
            'history' => 'Hostoria si es que tiene',
            'placeName' => 'Plaza 14 de Septiembre',
            'mainImage' => 'mainImage.jpg',
            'mainVideo' => '/src/common/places/1/main.VGA',
            'Streets' => 'Avenida Ayacucho entre lanza y sanmartin',
            'latitude' => -17.3783261,
            'longitude' => -66.1521979,
            'businessHours' => '07:00 AM - 19:00 PM',
            'type' => 'place' 
        ]);

        DB::table('touristicPlace')->insert([
            'provinceId' => 2,
            'userId' => 1,
            'placeStatusId' => 1,
            'description' => 'Descripcion para un lugar turistico2',
            'history' => 'Hostoria si es que tiene2',
            'placeName' => 'Hotel Cochabamba',
            'mainImage' => 'mainImage.jpg',
            'mainVideo' => '/src/common/places/1/main.VGA',
            'Streets' => 'Pase boulevard',
            'latitude' => -17.3926829,
            'longitude' => -66.1571253,
            'businessHours' => '07:00 AM - 19:00 PM',
            'type' => 'place'
        ]);

        DB::table('touristicPlace')->insert([
            'provinceId' => 3,
            'userId' => 1,
            'placeStatusId' => 1,
            'description' => 'Descripcion para un lugar turistico3',
            'history' => 'Hostoria si es que tiene',
            'placeName' => 'Iglesia de Cala Cala',
            'mainImage' => 'mainImage.jpg',
            'mainVideo' => '/src/common/places/1/main.VGA',
            'Streets' => 'Avenida Ayacucho entre lanza y sanmartin',
            'latitude' => 145.01223414,
            'longitude' => 9876.45156,
            'businessHours' => '07:00 AM - 19:00 PM',
            'type' => 'place'
        ]);

        DB::table('touristicPlace')->insert([
            'provinceId' => 4,
            'userId' => 1,
            'placeStatusId' => 1,
            'description' => 'Descripcion para un lugar turistico',
            'history' => 'Hostoria si es que tiene',
            'placeName' => 'Plaza principal',
            'mainImage' => 'mainImage.jpg',
            'mainVideo' => '/src/common/places/1/main.VGA',
            'Streets' => 'Avenida Ayacucho entre lanza y sanmartin',
            'latitude' => 145.01223414,
            'longitude' => 9876.45156,
            'businessHours' => '07:00 AM - 19:00 PM',
            'type' => 'place'
        ]);

        //Eventos
        DB::table('touristicPlace')->insert([
            'provinceId' => 4,
            'userId' => 1,
            'placeStatusId' => 1,
            'description' => 'Descripcion para un lugar turistico',
            'history' => 'Hostoria si es que tiene',
            'placeName' => 'Evento Plaza principal',
            'mainImage' => 'mainImage.jpg',
            'mainVideo' => '/src/common/places/1/main.VGA',
            'Streets' => 'Avenida Ayacucho entre lanza y sanmartin',
            'latitude' => 145.01223414,
            'longitude' => 9876.45156,
            'businessHours' => '07:00 AM - 19:00 PM',
            'type' => 'event',
            'startDate' => '2020-10-02',
            'endDate' => '2019-11-02'
        ]);

        DB::table('touristicPlace')->insert([
            'provinceId' => 4,
            'userId' => 1,
            'placeStatusId' => 1,
            'description' => 'Descripcion para un lugar turistico',
            'history' => 'Hostoria si es que tiene',
            'placeName' => 'Feria Plaza principal',
            'mainImage' => 'mainImage.jpg',
            'mainVideo' => '/src/common/places/1/main.VGA',
            'Streets' => 'Avenida Ayacucho entre lanza y sanmartin',
            'latitude' => 145.01223414,
            'longitude' => 9876.45156,
            'businessHours' => '07:00 AM - 19:00 PM',
            'type' => 'event',
            'startDate' => '2020-11-02',
            'endDate' => '2019-11-05'
        ]);
    }
}
