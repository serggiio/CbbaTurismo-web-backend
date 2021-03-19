<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //table tag
        $this->call(TagSeeder::class);
        //table status
        $this->call(StatusSeeder::class);
        //table userType
        $this->call(UserTypeSeeder::class);
        //table province
        $this->call(ProvinceSeeder::class);
        //table userTable
        $this->call(UserTableSeeder::class);
        //table touristicPlace
        $this->call(TouristicPlaceSeeder::class);
        //table placeStatus
        //$this->call(PlaceStatusSeeder::class);
        //table gallery
        $this->call(GallerySeeder::class);
        //table videos
        //$this->call(VideosSeeder::class);
        //table images
        $this->call(ImagesSeeder::class);
        //table commentary
        $this->call(CommentarySeeder::class);
        //table rate
        $this->call(RateSeeder::class);
        //table favorite
        $this->call(FavoriteSeeder::class);
        //table placeTag
        $this->call(PlaceTagSeeder::class);
        //table category
        $this->call(CategorySeeder::class);
    }
}
