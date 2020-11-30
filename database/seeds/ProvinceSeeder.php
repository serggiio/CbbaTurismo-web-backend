<?php

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('province')->truncate();
        DB::table('province')->insert([
            'provinceName' => 'Cercado'
        ]);

        DB::table('province')->insert([
            'provinceName' => 'Cochabamba'
        ]);
        DB::table('province')->insert([
            'provinceName' => 'Tarata'
        ]);
        DB::table('province')->insert([
            'provinceName' => 'Sacaba'
        ]);
    }
}
