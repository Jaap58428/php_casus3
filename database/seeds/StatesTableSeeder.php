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
        ['state_description' => 'Bij eigenaar'],
        ['state_description' => 'Aangeboden aan lener'],
        ['state_description' => 'Bij lener'],
        ['state_description' => 'Aangeboden aan eigenaar'],
      ];

      foreach ($list as $item) {
        DB::table('states')->insert($item);
      }
    }
}
