<?php

/** @var Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uuid' => Str::uuid()->toString(),
        'stock' => $faker->numberBetween(1, 100),
        'price' => $faker->randomFloat(2, 1, 100),
    ];
});
