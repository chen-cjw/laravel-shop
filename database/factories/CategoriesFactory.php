<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    $categories = [
        ["服饰内衣",22],
        ["运动户外",21],
        ["鞋靴",19],
        ["礼品箱包",18],
        ["食品饮料",17],
        ["酒类",16],
        ["生鲜",15],
        ["土特产",14],
        ["钟表",13],
        ["珠宝首饰",12],
        ["医药保健",11],
        ["母婴",9],
        ["玩具乐器",8],
        ["宠物",7],
        ["生活厨具",6],
        ["家装建材",5],
        ["农资绿植",4],
        ["家用电器",3],
        ["电脑、办公",2],
        ["手机类数码",1],
    ];

    $category   = $faker->randomElement($categories);

    return [
        'title'      => $category[0],
        'sort_num'   => 1,
        'on_sale'    => true,
    ];
});
