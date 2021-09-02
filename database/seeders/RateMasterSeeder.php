<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RateMasterSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'rate_master' )->insert( [

            [
                'start_contraction' => 1,
                'end_contraction' => 50,
                'area' => '1sqr',
                'water_charges_monthly' => 12,
                'water_chwith_compensation' => 120,
                'water_chwithout_compensation' => 144,
                'drainage_chwith_comp' => 27,
                'drainage_chwithout_comp' => 30,
            ],
            [
                'start_contraction' => 51,
                'end_contraction' => 100,
                'area' => '1sqr',
                'water_charges_monthly' => 24,
                'water_chwith_compensation' => 240,
                'water_chwithout_compensation' => 288,
                'drainage_chwith_comp' => 40,
                'drainage_chwithout_comp' => 45,
            ],
            [
                'start_contraction' =>101,
                'end_contraction' => 125,
                'area' => '1sqr',
                'water_charges_monthly' => 30,
                'water_chwith_compensation' =>360,
                'water_chwithout_compensation' => 300,
                'drainage_chwith_comp' => 45,
                'drainage_chwithout_comp' => 50,
            ],
            [
                'start_contraction' =>126,
                'end_contraction' => 150,
                'area' => '1sqr',
                'water_charges_monthly' => 36,
                'water_chwith_compensation' =>300,
                'water_chwithout_compensation' => 360,
                'drainage_chwith_comp' => 54,
                'drainage_chwithout_comp' => 60,
            ],
            [
                'start_contraction' =>151,
                'end_contraction' => 200,
                'area' => '1sqr',
                'water_charges_monthly' => 60,
                'water_chwith_compensation' =>600,
                'water_chwithout_compensation' => 720,
                'drainage_chwith_comp' => 67,
                'drainage_chwithout_comp' => 75,
            ],
            [
                'start_contraction' =>201,
                'end_contraction' => 300,
                'area' => '1sqr',
                'water_charges_monthly' => 90,
                'water_chwith_compensation' =>900,
                'water_chwithout_compensation' =>1080,
                'drainage_chwith_comp' => 81,
                'drainage_chwithout_comp' => 90,
            ],
            [
                'start_contraction' =>301,
                'end_contraction' => 10000,
                'area' => '1sqr',
                'water_charges_monthly' => 120,
                'water_chwith_compensation' =>1200,
                'water_chwithout_compensation' =>1440,
                'drainage_chwith_comp' => 95,
                'drainage_chwithout_comp' => 105,
            ],

        ] );
    }
}
