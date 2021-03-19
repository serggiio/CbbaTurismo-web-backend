<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('usertable')->truncate();
        DB::table('usertable')->insert([
            'statusId' => 1,
            'typeId' => 1,
            'name' => 'Sergio',
            'lastName' => 'Fernandez',
            'phoneNumber' => '72224078',
            'email' => 'sergiocep2010@gmail.com',
            'password' => bcrypt('cdngmwuk')
        ]);

        DB::table('usertable')->insert([
            'statusId' => 2,
            'typeId' => 2,
            'name' => 'Roland',
            'lastName' => 'munoz',
            'phoneNumber' => '72224071',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('cdngmwuk1')
        ]);

        DB::table('usertable')->insert([
            'statusId' => 3,
            'typeId' => 2,
            'name' => 'Bryan',
            'lastName' => 'Chavez',
            'phoneNumber' => '72224072',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('cdngmwuk2')
        ]);

        DB::table('usertable')->insert([
            'statusId' => 4,
            'typeId' => 3,
            'name' => 'Juan',
            'lastName' => 'Perez',
            'phoneNumber' => '72224073',
            'email' => 'sergioss21er@gmail.com',
            'password' => bcrypt('cdngmwuk')
        ]);

    }
}
