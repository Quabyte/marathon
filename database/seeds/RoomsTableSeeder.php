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
        	'price' => 32.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 1,
        	'name' => 'Double Room',
        	'price' => 56.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Single Room',
        	'price' => 50.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Double Room',
        	'price' => 80.00
        ]);
    }
}
