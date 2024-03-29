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

$factory->define(OVH\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'type' => $faker->randomElement(['admin', 'customer'])
    ];
});

$factory->define(OVH\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(OVH\Ticket::class, function (Faker\Generator $faker) {
    return [
        'subject' => $faker->sentence(),
        'status' => $faker->randomElement(['open', 'closed', 'waiting']),
        'user_id' => $faker->numberBetween(1, 50),
        'category_id' => $faker->numberBetween(1, 10),
    ];
});


$factory->define(OVH\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->sentences(10, true),
        'ticket_id' => $faker->numberBetween(1, 50),
        'user_id' => $faker->numberBetween(1, 50)
    ];
});
