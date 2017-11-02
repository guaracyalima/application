<?php

use App\Entities\State;
use Illuminate\Database\Seeder;

class StatateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/states.json");
        $states = json_decode($json);
        foreach ($states as $state){
            State::create(array(
                'id' => $state->id,
                'name' => $state->name,
                'initials' => $state->initials,
                'region_id' => $state->region
            ));
        }
    }
}
