<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'nombre_proyecto' => $faker->sentence,
        'saldo_contable' => rand(1000, 5000),
        'entidad_solicitante' => $faker->company,
        'contratista' => $faker->company,
        'monto_contratado' => rand(10000, 50000),
        'inicio_obra' => now(),
        'fin_obra' => now()
    ];
});
