<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('usertype')->truncate();
        DB::table('usertype')->insert([
            'nameType' => 'Administrador'
        ]);

        DB::table('usertype')->insert([
            'nameType' => 'Usuario'
        ]);

        DB::table('usertype')->insert([
            'nameType' => 'Agente'
        ]);

    }
}
