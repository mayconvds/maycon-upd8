<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CitiesSeed extends Seeder
{
//    private $cities = $cities;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var $cities array
         */
        require __DIR__ . "/../../config/cities.php";
        foreach ($cities as  $city) {
            DB::table("cities")->insert([
               "id" => $city[0],
                "ufid" => $city[1],
                "name" => $city[2]
            ]);
        }
    }
}
