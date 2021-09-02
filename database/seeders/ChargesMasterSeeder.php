<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ChargesMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('charges_master')->insert([

            [
                'ch_name' => 'Water usage charge (in advance) Rs',
                'charges' => 55,
                'type' => 'V',
                
            ],
            [
                'ch_name' => 'Connection charge (which will not be refunded under any circumstances)',
                'charges' => 20,
                'type' => 'V',
            ],
            [  
                'ch_name' => 'Cost of ferrule',
                'charges' => 150,
                 'type' => 'V',
            ],
           

        ]);
    }
}
