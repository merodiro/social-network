<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $name = $faker->name;
    $gender = $faker->boolean;
    if ($gender) {
        $avatar = 'public/defaults/avatars/male.png';
    } else {
        $avatar = 'public/defaults/avatars/female.png';
    }

    return [
        'name'           => $name,
        'email'          => $faker->unique()->safeEmail,
        'slug'           => str_slug($name),
        'gender'         => $gender,
        'avatar'         => $avatar,
        'password'       => $password ?: $password = Hash::make('secret'),
        'remember_token' => str_random(10),
    ];
});
