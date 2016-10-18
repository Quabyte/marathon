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
        	'price' => 65.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 1,
        	'name' => 'Double Room',
        	'price' => 65.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 1,
        	'name' => 'Triple Room',
        	'price' => 83.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Single Room',
        	'price' => 45.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Double Room',
        	'price' => 45.00
        ]);

        DB::table('rooms')->insert([
        	'hotel_id' => 2,
        	'name' => 'Triple Room',
        	'price' => 57.00
        ]);
    }
}
