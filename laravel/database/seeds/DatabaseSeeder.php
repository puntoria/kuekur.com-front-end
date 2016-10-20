<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();

        factory(App\Category::class, 20)->create();

        factory(App\Country::class, 20)->create()->each(function($u) {
        	for($i=0; $i<10; $i++){
	        	$u->cities()->save(factory(App\City::class)->make());
	        }
        });

        factory(App\Tag::class, 20)->create();

        factory(App\Event::class, 20)->create()->each(function($u) {
        	for($i=0; $i<4; $i++){
	        	$u->tags()->save( App\Tag::find(rand(1,20)) );
	        }
        });

    }
}
