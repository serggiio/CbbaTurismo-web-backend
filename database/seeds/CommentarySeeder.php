<?php

use Illuminate\Database\Seeder;

class CommentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('commentary')->truncate();
        DB::table('commentary')->insert([
            'userId' => 1,
            'touristicPlaceId' => 1,
            'commentaryDesc' => 'Este es un buen comentario',
            'reports' => 0,
            'commentaryStatus' => 'Active'
        ]);

        DB::table('commentary')->insert([
            'userId' => 1,
            'touristicPlaceId' => 1,
            'commentaryDesc' => 'Este es un buen comentario 2',
            'reports' => 3,
            'commentaryStatus' => 'Active'
        ]);

        DB::table('commentary')->insert([
            'userId' => 1,
            'touristicPlaceId' => 2,
            'commentaryDesc' => 'Este es un buen comentario 3',
            'reports' => 0,
            'commentaryStatus' => 'Active'
        ]);

        DB::table('commentary')->insert([
            'userId' => 2,
            'touristicPlaceId' => 3,
            'commentaryDesc' => 'Este es un buen comentario 4',
            'reports' => 0,
            'commentaryStatus' => 'Inactive'
        ]);
    }
}
