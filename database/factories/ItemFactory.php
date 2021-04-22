<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'register_number' => $faker->numberBetween(100, 1000),
        'quantity' => $faker->numberBetween(1,1000),
        'category_id' => factory(Category::class),
        'name' => $faker->name,
    ];
});
