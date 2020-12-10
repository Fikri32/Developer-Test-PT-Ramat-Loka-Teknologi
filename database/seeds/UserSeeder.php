<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $petugas = User::Create([
        'name' => 'Petugas',
        'email' => 'petugas@perpustakaan.com',
        'password' => bcrypt('admin123')
      ]);
    }
}
