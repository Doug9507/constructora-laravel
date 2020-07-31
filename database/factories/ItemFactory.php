<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'project_id' => 4,
        'tipo_operacion' => $faker->sentence,
        'fecha_registro' => now(),
        'descripcion' => $faker->text,
        'cantidad' => rand(1,5),
        'precio_unitario' => rand(50,100),
        'monto_total' => rand(200,1000),
        'tipo_recurso' => $faker->sentence,
        'proveedor' => $faker->company,
        'tipo_comprobante' => $faker->sentence,
        'numero_comprobante' => $faker->swiftBicNumber
    ];
});
