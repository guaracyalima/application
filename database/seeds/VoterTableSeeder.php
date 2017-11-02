<?php

use Illuminate\Database\Seeder;

class VoterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Voter::class, 10)->create();
    }
}
