<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\introduce;
use Faker\Generator as Faker;

$factory->define(introduce::class, function (Faker $faker) {
    return [
        'description' => '安装 Intervention/image 扩展包找不到资源
 问答 /  502 /  2 / 发布于 3个月前

省略了执行的 composer require intervention/image 过程

Discovered Package: nunomaduro/collision
Package manifest generated successfully.
vagrant@homestead:~/Code/larabbs$ php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"
Unable to locate publishable resources.
Publishing complete.'
    ];
});
