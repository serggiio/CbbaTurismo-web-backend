<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('status')->truncate();
        DB::table('status')->insert([
            'statusName' => 'INACTIVO'
        ]);

        DB::table('status')->insert([
            'statusName' => 'ACTIVO'
        ]);
        DB::table('status')->insert([
            'statusName' => 'BLOQUEADO'
        ]);
        DB::table('status')->insert([
            'statusName' => 'REVISION'
        ]);
    }
}
