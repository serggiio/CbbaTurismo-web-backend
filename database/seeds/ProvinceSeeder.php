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
            'provinceName' => 'Cercado',
            'latitude' => -17.3697351,
            'longitude' => -66.1653224
        ]);

        DB::table('province')->insert([
            'provinceName' => 'Cochabamba',
            'latitude' => -17.3697351,
            'longitude' => -66.1653224
        ]);
        DB::table('province')->insert([
            'provinceName' => 'Tarata',
            'latitude' => -17.6091383,
            'longitude' => -66.0255368
        ]);
        DB::table('province')->insert([
            'provinceName' => 'Sacaba',
            'latitude' => -17.4057139,
            'longitude' => -66.0430242
        ]);
    }
}
