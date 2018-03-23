<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $list = [
        ['id' => Uuid::generate(), 'state_description' => 'Bij eigenaar'],
        ['id' => Uuid::generate(), 'state_description' => 'Aangeboden aan lener'],
        ['id' => Uuid::generate(), 'state_description' => 'Bij lener'],
        ['id' => Uuid::generate(), 'state_description' => 'Aangeboden aan eigenaar'],
      ];

      foreach ($list as $item) {
        DB::table('states')->insert($item);
      }
    }
}
