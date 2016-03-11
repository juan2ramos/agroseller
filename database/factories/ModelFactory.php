<?php

use Faker\Generator;
use Agrosellers\User;
use Agrosellers\Entities\Product;

$factory->define(User::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->email,
        'username' => $faker->userName,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'mobile_phone' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'photo' => 'user.png',
        'role_id' => $faker->randomElement([2,3,4]),
    ];
});

$factory->define(Product::class, function(Generator $faker){
    return [
        'presentation' => $faker->randomElement(['Paquete', 'Bulto', 'Galon']),
        'size' => $faker->randomElement(['Grande', 'Mediano', 'Pequeño']),
        'weight' => $faker->randomFloat([10],[100]),
        'measure' => $faker->randomElement(['Centimetros', 'Metros']),
        'material' => $faker->randomElement(['Madera', 'Plastico', 'Metal']),
        'description' => $faker->text($maxNbChars = 200),
        'composition' => 'datos.pdf',
        'forms-employment' => 'forms-employment',
        'price' => $faker->numberBetween($min = 10000, $max = 10000000),
        'taxes' => 'IVA',
        'available-quantity' => $faker->numberBetween($min = 10000, $max = 10000000),
        'image-scale' => $faker->imageUrl($width = 640, $height = 480),
        'location' => $faker->country,
        'offer' => $faker->numberBetween($min = 5, $max = 80),
        'offer-price' => $faker->numberBetween($min = 10000, $max = 1000000),
        'name' => $faker->firstName($gender = null|'male'|'female'),
        'slug' => 'slug',
        'subcategory_id' => $faker->numberBetween($min = 1, $max = 28),
        'user_id' => 2,
    ];
});