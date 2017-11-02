<?php

use Illuminate\Database\Seeder;

class SendMailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Sendmail::class, 40)->create();
    }
}
