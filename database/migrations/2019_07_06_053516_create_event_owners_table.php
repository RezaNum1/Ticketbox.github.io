<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->string('name', 100);
            $table->binary('file');
            $table->string('address', 200);
            $table->string('city', 200);
            $table->string('description', 400);
            $table->string('price', 100);
            $table->string('stock', 100);
            $table->string('event_categories', 200);
            $table->date('date');
            $table->string('time');
            $table->string('status',10)->default('1');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_owners');
    }
}
