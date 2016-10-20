<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->integer('featured_image_id')->unsigned()->nullable();
            $table->integer('logo_id')->unsigned()->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->boolean('recurring')->default(0);
            $table->longText('recurring_data'); 
            $table->enum('status',['live', 'started', 'ended', 'canceled', 'upcoming'])->default('upcoming');
            $table->integer('capacity')->unsigned();
            $table->integer('organizer_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('zip')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    
        Schema::create('event_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_user');

        Schema::drop('events');
    }
}
