<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        //
        'nama_barang' => $faker->word,
        'kategori_id' => $faker->numberBetween(1,9),
        'harga_barang' => $faker->numberBetween(10000,50000),
        'stok_barang' => $faker->numberBetween(0,30),
        
    
    ];
});
