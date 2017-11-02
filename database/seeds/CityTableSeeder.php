<?php

use App\Entities\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/cities.json");
        $cities = json_decode($json);
        foreach ($cities as $city){
            City::create(array(
                'id' => $city->id,
                'name' => $city->name,
                'state_id' => $city->state
            ));
        }
    }
}
