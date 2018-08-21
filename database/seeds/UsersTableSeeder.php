<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('users')->delete();

    $dateNow = date('Y-m-d H:i:s');

    DB::table('users')->insert([
      'id' => 1,
      'name' => 'admin',
      'email' => 'admin@example.com',
      'type' => 'superadmin',
      'password' => bcrypt('secret'),
      'created_at' => $dateNow,
      'updated_at' => $dateNow
    ]);

    DB::table('users')->insert([
      'id' => 2,
      'name' => 'user',
      'email' => 'user@example.com',
      'type' => 'user',
      'password' => bcrypt('secret'),
      'created_at' => $dateNow,
      'updated_at' => $dateNow
    ]);

    DB::table('users')->insert([
      'id' => 3,
      'name' => 'blocked',
      'email' => 'blocked@example.com',
      'type' => 'user',
      'blocked_on' => $dateNow,
      'password' => bcrypt('secret'),
      'created_at' => $dateNow,
      'updated_at' => $dateNow
    ]);
  }
}
