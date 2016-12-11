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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'surname' => $faker->lastName,
        'middle_name' => $faker->name,
        'firstname'   => $faker->firstNameMale,
        'idcardnumber'=> $faker->creditCardNumber,
        'passportnumber' => $faker->creditCardNumber,
        'gender'         => "male",
        'staff_id' 		 => $faker->randomNumber($nbDigits = 9),
        'email' 		=> $faker->unique()->safeEmail,
        'work_email'	=> $faker->unique()->companyEmail,
        'registered'    => $faker->boolean($chanceOfGettingTrue = 50),
        'password' => $password ?: $password = bcrypt('1234'),
        'remember_token' => str_random(10),
    ];
});
