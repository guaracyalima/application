<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\User::class)->create([
            'name' => 'Common User',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)]);

        factory(\App\Entities\User::class)->create([
            'name' => 'Root User',
            'email' => 'root@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)]);
    }
}
