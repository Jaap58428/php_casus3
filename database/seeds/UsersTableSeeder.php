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
        ['id' => Uuid::generate()->string, 'name' => 'Jaap', 'email' => 'jaap@gmail.com', 'password' => bcrypt('qwerty')],
        ['id' => Uuid::generate()->string, 'name' => 'Joop', 'email' => 'joop@gmail.com', 'password' => bcrypt('qwerty')],
        ['id' => Uuid::generate()->string, 'name' => 'Joep', 'email' => 'joep@gmail.com', 'password' => bcrypt('qwerty')],
      ];

      foreach ($user_list as $user) {
        DB::table('users')->insert($user);
      }
    }
}
