<?php

use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('extras')->insert([
        	'name' => 'Bosphorus Tour',
        	'coverPhoto' => 'bogaz.jpg',
        	'price' => 25.00,
        ]);

        DB::table('extras')->insert([
        	'name' => 'Lunch at Bosphorus',
        	'coverPhoto' => 'yemek.jpg',
        	'price' => 27.00,
        ]);

        DB::table('extras')->insert([
        	'name' => 'Turkish Hammam',
        	'coverPhoto' => 'hamam.jpg',
        	'price' => 21.00,
        ]);
    }
}
