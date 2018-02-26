<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'status' => 1,
        'short_description' => $faker->sentence,
        'description' => $faker->text,
        'courses_count' => 5,
        'students' => '228',
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->text,
        'short_description' => $faker->sentence,
        'image' => '/img/course-img.jpg',
        'category_id' => $faker->numberBetween(1,5),
        'user_id' => 1,
        'skills' => 'HTML',
        'requirements' => 'Java',
        'status' => 1,
        'price' => $faker->numberBetween(5, 20),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'group' => $faker->numberBetween(1,3)
    ];
});

