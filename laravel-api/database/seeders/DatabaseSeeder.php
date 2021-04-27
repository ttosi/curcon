<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('user')->insert([
      'email' => 'user@gmail.com',
      'password' => hash('sha256', 'password'),
    ]);
  }
}
