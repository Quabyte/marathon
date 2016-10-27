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
        	'name' => 'Escape to Prince\'s Islands',
            'includes' => 'Transportation by air conditioned vehicles
                        Fully escorted by an English speaking tour guide
                        Admission fees, Lunch',
            'excludes' => 'Drinks and all personal expenses.',
            'terms' => 'Cancellation can be done a night before for half day morning and full day tours in İstanbul and 4 hours prior to afternoon tour avoid penalty, otherwise full tour rate will be charged.
                        Children 11 and younger receive 50% discount',
        	'coverPhoto' => 'islands.jpg',
        	'price' => 80.00,
        ]);

        DB::table('extras')->insert([
        	'name' => 'A Cruise on the Bosphorus',
            'includes' => 'Transportation by air conditioned vehicles
                        Fully escorted by an English speaking tour guide
                        Admission fees',
            'excludes' => 'Drinks and all personal expenses',
            'terms' => 'Cancellation can be done a night before for half day morning and full day tours in İstanbul and 4 hours prior to afternoon tour avoid penalty, otherwise full tour rate will be charged.
                        Children 11 and younger receive 50% discount',
        	'coverPhoto' => 'bogaz.jpg',
        	'price' => 40.00,
        ]);

        DB::table('extras')->insert([
            'name' => 'An Afternoon At The Ottoman Court',
            'includes' => 'Transportation by air conditioned vehicles
                        Fully escorted by an English speaking tour guide
                        Admission fees',
            'excludes' => 'Drinks and all personal expenses',
            'terms' => 'Cancellation can be done a night before for half day morning and full day tours in İstanbul and 4 hours prior to afternoon tour avoid penalty, otherwise full tour rate will be charged.
                        Children 11 and younger receive 50% discount',
            'coverPhoto' => 'palace.jpg',
            'price' => 40.00,
        ]);

        DB::table('extras')->insert([
            'name' => 'Discover the Old City',
            'includes' => 'Transportation by air conditioned vehicles
                        Fully escorted by an English speaking tour guide
                        Admission fees',
            'excludes' => 'Drinks and all personal expenses',
            'terms' => 'Cancellation can be done a night before for half day morning and full day tours in İstanbul and 4 hours prior to afternoon tour avoid penalty, otherwise full tour rate will be charged.
                        Children 11 and younger receive 50% discount',
            'coverPhoto' => 'oldcity.jpg',
            'price' => 40.00,
        ]);
    }
}
