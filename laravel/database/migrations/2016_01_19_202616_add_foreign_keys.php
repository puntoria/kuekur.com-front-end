<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usermeta', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');

        });


        Schema::table('events', function (Blueprint $table) {

            $table->foreign('featured_image_id')->references('id')->on('media_files');
            $table->foreign('logo_id')->references('id')->on('media_files');

            $table->foreign('organizer_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
            
        });

        Schema::table('event_tag', function (Blueprint $table) {

            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('event_id')->references('id')->on('events');

        });

        Schema::table('event_user', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');

        });

        Schema::table('event_fields', function (Blueprint $table) {

            $table->foreign('event_id')->references('id')->on('events');

        });

        Schema::table('cities', function (Blueprint $table) {

            $table->foreign('country_id')->references('id')->on('countries');

        });


        Schema::table('media_files', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::table('usermeta', function (Blueprint $table) {

            $table->dropForeign('usermeta_user_id_foreign');

        });


        Schema::table('events', function (Blueprint $table) {

            $table->dropForeign('events_featured_image_id_foreign');
            $table->dropForeign('events_logo_id_foreign');

            $table->dropForeign('events_organizer_id_foreign');
            $table->dropForeign('events_category_id_foreign');

            $table->dropForeign('events_country_id_foreign');
            $table->dropForeign('events_city_id_foreign');
            
        });

        Schema::table('event_tag', function (Blueprint $table) {

            $table->dropForeign('event_tag_tag_id_foreign');
            $table->dropForeign('event_tag_event_id_foreign');

        });

        Schema::table('event_user', function (Blueprint $table) {

            $table->dropForeign('event_user_user_id_foreign');
            $table->dropForeign('event_user_event_id_foreign');

        });

        Schema::table('event_fields', function (Blueprint $table) {

            $table->dropForeign('event_fields_event_id_foreign');

        });

        Schema::table('cities', function (Blueprint $table) {

            $table->dropForeign('cities_country_id_foreign');

        });
        
        Schema::table('media_files', function (Blueprint $table) {

            $table->dropForeign('media_files_user_id_foreign');

        });
        
    }
}
