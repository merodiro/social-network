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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $name = $faker->name;
    $gender = $faker->boolean;
    if ($gender) {
        $avatar = 'public/defaults/avatars/male.png';
    } else {
        $avatar = 'public/defaults/avatars/female.png';
    }
    
    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'slug' => str_slug($name),
        'gender' => $gender,
        'avatar' => $avatar,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {

    return [
        'location' => $faker->city,
        'about' => $faker->realText(rand(20, 300))
     ];     
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'content' => $faker->realText(rand(20, 300))
     ];     
});