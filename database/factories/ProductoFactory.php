<?php

use Faker\Generator as Faker;

$factory->define(Empresa\Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->linuxProcessor,
        'precio' => $faker->numberBetween(2000, 100000)
    ];
});
