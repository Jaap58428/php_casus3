<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_list = [
        ['id' => (string) Uuid::generate(), 'name' => 'Jaap', 'email' => 'jaap@gmail.com', 'password' => bcrypt('qwerty')],
        ['id' => (string) Uuid::generate(), 'name' => 'Joop', 'email' => 'joop@gmail.com', 'password' => bcrypt('qwerty')],
        ['id' => (string) Uuid::generate(), 'name' => 'Joep', 'email' => 'joep@gmail.com', 'password' => bcrypt('qwerty')],
      ];

      foreach ($user_list as $user) {
        DB::table('users')->insert($user);
      }
    }
}
