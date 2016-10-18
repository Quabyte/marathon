<?php

use Illuminate\Database\Seeder;

class MarathonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marathons')->insert([
        	'name' => '40K/Marathon',
        	'coverPhoto' => 'marathon.jpg',
        	'price' => 23.40
        ]);

        DB::table('marathons')->insert([
        	'name' => '15K',
        	'coverPhoto' => '15k.jpg',
        	'price' => 23.40
        ]);

        DB::table('marathons')->insert([
        	'name' => '10K',
        	'coverPhoto' => '10k.jpg',
        	'price' => 23.40
        ]);
    }
}
