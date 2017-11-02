<?php

use App\Entities\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/teritories.json");
        $regions = json_decode($json);
        foreach ($regions as $region){
            Region::create(array(
                'id' => $region->id,
                'name' => $region->name
            ));
        }
    }
}
