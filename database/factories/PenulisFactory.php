<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Penulis;
use Faker\Generator as Faker;

$factory->define(Penulis::class, function (Faker $faker) {
  return [
      'nama' => $faker->name(),
      'alamat' => $faker->address(),
      'no_hp' => $faker->phoneNumber(), 
  ];
});