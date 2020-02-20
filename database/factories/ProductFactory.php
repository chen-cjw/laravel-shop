<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'description'=>$faker->text(),
        'image'=>"http://img0.imgtn.bdimg.com/it/u=3887379252,3315859978&fm=26&gp=0.jpg",
        'on_sale'=>true,
        'stock'=>rand(1,9999),
        'rating'=>5,
        'sold_count'=>rand(1,100),
        'review_count'=>rand(1,10),
        'price'=>rand(1,10),
        'category_id'=>rand(1,20)
    ];
});
