<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductSku;
use Faker\Generator as Faker;

$factory->define(ProductSku::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'description'=>$faker->text(),
        'price'=>rand(10,999999),
        'stock'=>rand(10,10000),
        'product_id'=>rand(1,10)
    ];
});
