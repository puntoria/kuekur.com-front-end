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
    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug
    ];
});


$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->country
    ];
});


$factory->define(App\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city
    ];
});


$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug
    ];
});

/*
LETS US KNOW WHAT DATA WE SHOULD FAKE

$table->increments('id');
$table->string('name');
$table->string('slug');
$table->integer('featured_image_id')->unsigned()->nullable();
$table->integer('logo_id')->unsigned()->nullable();
$table->datetime('start');
$table->datetime('end');
$table->boolean('recurring')->default(0);
$table->longText('recurring_data');
$table->enum('status',['started', 'canceled', 'upcoming'])->default('upcoming');
$table->integer('capacity')->unsigned();
$table->integer('organizer_id')->unsigned();
$table->integer('category_id')->unsigned();
$table->string('address_1');
$table->string('address_2')->nullable();
$table->string('zip')->nullable();
$table->integer('country_id')->unsigned()->nullable();
$table->integer('city_id')->unsigned()->nullable();
$table->integer('latitude');
$table->integer('longitude');
$table->timestamps();
*/


$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'start' => $faker->dateTime,
        'end' => $faker->dateTime,
        'status' => $faker->randomElement(['started', 'canceled', 'upcoming']),
        'capacity' => $faker->numberBetween(1,100000),
        'address_1' => $faker->address,
        'address_2' => $faker->address,
        'zip' => $faker->postcode,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'organizer_id' => $faker->numberBetween(1,20),
        'category_id' => $faker->numberBetween(1,20),
        'country_id' => $faker->numberBetween(1,20),
        'city_id' => $faker->numberBetween(1,200),
    ];
});
