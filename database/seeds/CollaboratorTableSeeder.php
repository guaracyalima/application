<?php

use Illuminate\Database\Seeder;

class CollaboratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Collaborator::class, 10)->create();
    }
}
