<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Penulis::class, 5)->create();
    }
}
