<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Distributor;
use Faker\Generator as Faker;

$factory->define(Distributor::class, function (Faker $faker) {
    return [
        //
        'nama_distributor' => $faker->name,
        'alamat_distributor' => $faker->address,
        'email_distributor' => $faker->unique()->safeEmail,
        'status' => 'aktif'        
    ];
});
