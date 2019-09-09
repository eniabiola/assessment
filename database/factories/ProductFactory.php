<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Product;
use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(100,1000),
        'category' => $faker->word,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'color' => $faker->hexcolor,
        'user_id' => function(){
            return App\User::all()->random();
        }
    ];
});
