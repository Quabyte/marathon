<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
        	'name' => 'Sura Design Hotel & Suites',
        	'coverPhoto' => 'sura',
        	'rate' => 8.80,
        	'location' => 'Fatih/Istanbul',
        ]);

        DB::table('hotels')->insert([
        	'name' => 'Hotellino Istanbul',
        	'coverPhoto' => 'hotellino',
        	'rate' => 8.90,
        	'location' => 'Fatih/Istanbul',
        ]);
    }
}
