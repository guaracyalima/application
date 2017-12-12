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
            'type' => 'root',
            'remember_token' => str_random(10)]);

        factory(\App\Entities\User::class)->create([
            'name' => 'Root User',
            'email' => 'root@user.com',
            'password' => bcrypt(123456),
            'type' => 'comon',
            'remember_token' => str_random(10)]);

        factory(\App\Entities\User::class)->create([
            'name' => 'Candidato Elejase',
            'email' => 'candidatot@elejase.com',
            'password' => bcrypt(123456),
            'type' => 'candidate',
            'remember_token' => str_random(10)]);

        factory(\App\Entities\User::class)->create([
            'name' => 'Candidato Segundo',
            'email' => 'candidato2t@elejase.com',
            'password' => bcrypt(123456),
            'type' => 'candidate',
            'remember_token' => str_random(10)]);

        factory(\App\Entities\User::class)->create([
            'name' => 'Colaborador Um',
            'email' => 'colaborator@elejase.com',
            'password' => bcrypt(123456),
            'type' => 'collaborator',
            'remember_token' => str_random(10)]);


        factory(\App\Entities\User::class)->create([
            'name' => 'Colaborador Dois',
            'email' => 'colaborator2@elejase.com',
            'password' => bcrypt(123456),
            'type' => 'collaborator',
            'remember_token' => str_random(10)]);
    }
}
