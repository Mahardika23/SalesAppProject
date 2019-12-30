<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tokko;
use Faker\Generator as Faker;

$factory->define(toko::class, function (Faker $faker) {
    return [
        'nama_toko' => $faker->name,
        'nama_pemilik' => $faker->name,
        'alamat_toko' => $faker->address,
        'email_pemilik' => $faker->unique()->safeEmail,
        'no_telp' =>$faker->num(),
        'userable_id' => factory(App\User::class),
        'userable_type' => function (array $toko){
            return App\User::find($toko['userable_id'])->type();

        },
        'province_id' => '11',
        'regency_id' => '1101',
        'district_id' => '1101010',
        'village_id' => '1101010001',
        
    ];
});
