<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Roler::class, function (Faker\Generator $faker) {
    return [
        'role' => $faker->word,
        'description' => $faker->word
    ];
});

$factory->define(App\Entities\Candidate::class, function (Faker\Generator $faker) {

    return [

        'user_id' => rand(1, 2),
        'plan_id' => rand(1, 5),
        'education_id' => rand(1, 5),
        'occupation_id' => rand(1, 5),
        'title' => $faker->userName,
        'politic_name' => $faker->name,
        'name' => $faker->name,
        'cpf' => rand(123, 999),
        'rg' => rand(123, 999),
        'broken_id' => rand(1, 2),
        'address' => $faker->address,
        'stret' => $faker->streetName,
        'neighborhood' => $faker->word,
        'cep' => $faker->countryCode,
        'city' => $faker->city,
        'uf' => $faker->company,
        'ddd_cellphone' => '123',
        'cellphone' => '123456789',
        'ddd_telephone' => '123',
        'telephone'=> '123456789',
        'email' => $faker->safeEmail,
        'whatsapp'=> '123456789',
        'biograph' => $faker->sentence,
        'created_by' => 1
    ];
});


$factory->define(App\Entities\Voter::class, function (Faker\Generator $faker) {
    $user = \App\Entities\User::first()->attributesToArray();
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nickname' => $faker->userName,
        'genre' => 'female',
        'birth' => \Carbon\Carbon::now(),
        'cpf' => rand(123, 999),
        'rg' => rand(123, 999),
        'voter_title' => rand(123, 999),
        'zone_id' => rand(123, 999),
        'session_id' => rand(123, 999),
        'address' => $faker->address,
        'stret' => $faker->streetName,
        'neighborhood' => $faker->word,
        'cep' => $faker->countryCode,
        'city' => $faker->city,
        'uf' => $faker->company,
        'observation' => $faker->sentence(),
        'education_id' => 1,
        'occupation_id' => 1,
        'ddd_cellphone' => rand(111, 999),
        'cellphone' => 999999999,
        'ddd_telephone' => rand(111, 999),
        'telephone' =>  999999999,
        'email' => $faker->safeEmail,
        'whatsapp'  =>  999999999,
        'created_by' => $user['name']
    ];
});


$factory->define(App\Entities\Plan::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'max_users' => rand(1, 1000),
        'max_electors'  => rand(1, 1000),
        'sms_quantity' => rand(1, 1000),
        'emails_quantity' => rand(1, 1000),
        'price' => rand(1, 1000),
        'renewal_frequency' => rand(1, 1000),
    ];
});


$factory->define(App\Entities\Collaborator::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 2),
        'candidate_id' => rand(1, 10),
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nickname' => $faker->word,
        'genre' => 'female',
        'birth' => \Carbon\Carbon::now(),
        'cpf' => rand(123, 999),
        'rg' => rand(123, 999),
        'voter_title' => rand(123, 999),
        'zone_id' => rand(123, 999),
        'session_id' => rand(123, 999),
        'address' => $faker->address,
        'stret' => $faker->streetName,
        'neighborhood' => $faker->word,
        'cep' => $faker->countryCode,
        'city' => $faker->city,
        'uf' => $faker->company,
        'created_by' => rand(1,2),
        'proposed_leads' => rand(1,100),
        'operation_state' => $faker->city,
        'operation_city' => $faker->city,
        'operation_neighborhoods' => $faker->word,
        'interest' => $faker->word,
        'whatsapp' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'telephone' => $faker->phoneNumber,
        'salary' => rand(1000, 50000),
        'observation' => $faker->sentence,
        'occupation_id' => 1,
        'education_id' => 1
    ];
});


$factory->define(App\Entities\Occupation::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->jobTitle
    ];
});

$factory->define(App\Entities\Package::class, function (Faker\Generator $faker) {

    return [
        'sms' => rand(1, 999),
        'mails' => rand(1, 999),
        'price' => rand(1, 999),
        'time_to_expiration' => rand(1, 999),
        'date_of_expiration' => $faker->dateTime
    ];
});

$factory->define(App\Entities\Sendmail::class, function (Faker\Generator $faker) {

    return [
        'from' => $faker->safeEmail,
        'sender' => $faker->companyEmail,
        'to' => $faker->name,
        'content' => $faker->word,
        'cc' => $faker->word,
        'bcc' => $faker->word,
        'replyTo' => $faker->email,
        'subject' => $faker->word,
        'priority' => $faker->word,
        'attach' => $faker->url,
        'attachData' => $faker->url,
        'user_id' => rand(14, 15)
    ];
});

$factory->define(App\Entities\Educations::class, function (Faker\Generator $faker) {

    return [
        'description' => $faker->jobTitle
    ];
});

$factory->define(App\Entities\Broken::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
        'description' => $faker->word
    ];
});
