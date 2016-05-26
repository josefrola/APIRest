<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('Clients', function (Blueprint $table) {
           $table->increments('id');
           $table->string('rut', 16);
           $table->string('name');
           $table->string('lastName');
           $table->string('phone',20);
           $table->string('mobile',20);
           $table->string('address');
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
        Schema::drop('Clients');
    }
}
