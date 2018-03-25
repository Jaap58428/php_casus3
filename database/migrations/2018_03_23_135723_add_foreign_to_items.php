<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('items', function ($table)
       {
         $table->foreign('state_id')->references('id')->on('states');
         $table->foreign('owner_id')->references('id')->on('users');
         $table->foreign('lender_id')->references('id')->on('users');
       });
     }
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('items', function ($table)
       {
         $table->dropForeign(['lender', 'owner', 'state']);
       });
     }
 }
