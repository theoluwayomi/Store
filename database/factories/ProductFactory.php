<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
    	'name' => $faker->sentence,
        'slug' => $faker->slug,
        'featured' => false,
        'details' => $faker->sentence(8),
        'price' => $faker->numberBetween(1000, 500000),
        'description' => $faker->paragraph,
        'image' => 'img/product/single-product/s-product-s-1.jpg',
        'images' => '["img/product/single-product/s-product-s-2.jpg","img/product/single-product/s-product-s-3.jpg","img/product/single-product/s-product-s-4.jpg"]',
        'quantity' => 10,
    ];
});
