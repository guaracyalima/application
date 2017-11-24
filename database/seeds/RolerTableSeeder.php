<?php

use Illuminate\Database\Seeder;

class RolerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Roler::class, 6)->create();
    }
}
