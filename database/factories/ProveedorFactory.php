<?php

use Faker\Generator as Faker;

$factory->define(Empresa\Proveedor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'rut' => $faker->unique()->creditCardNumber,
        'direccion' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'telefono' => $faker->phoneNumber,
        'giro' => $faker->realText(50),
    ];
});
