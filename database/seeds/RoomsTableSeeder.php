<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
        	'hotel_id' => 1,
        	'name' => 'Single Room',
        	'price' => 39.00,
            'type' => 1
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 1,
        	'name' => 'Double Room',
        	'price' => 62.00,
            'type' => 2,
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Single Room',
        	'price' => 27.00,
            'type' => 1
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Double Room',
        	'price' => 27.00,
            'type' => 2
        ]);
    }
}
