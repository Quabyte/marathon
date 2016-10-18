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
        	'name' => 'Intercontinental Istanbul',
        	'coverPhoto' => 'intercontinental',
        	'rate' => 8.70,
        	'location' => 'Beyoglu/Istanbul',
        ]);

        DB::table('hotels')->insert([
        	'name' => 'The Marmara Pera',
        	'coverPhoto' => 'pera',
        	'rate' => 8.00,
        	'location' => 'Beyoglu/Istanbul',
        ]);
    }
}
