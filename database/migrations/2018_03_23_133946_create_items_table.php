<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
          $table->uuid('id');
          $table->primary('id');
          $table->string('name');
          $table->string('description');
          $table->integer('state_id')->unsigned();  // Default bij eigenaar
          $table->uuid('owner_id');
          $table->uuid('lender_id')->nullable($value = true);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
