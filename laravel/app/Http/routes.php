<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Twilio Secret: WeQFstCNxzkN4ZS9rVmYymCGNZ5Z00Ny
// Twilio Sid: SKdd4f09662686e357f3de19d4027782d4

Route::group(['middleware' => ['web','auth'] ], function() { 

    // Events
    Route::get('/events/create', 'EventController@create');
    Route::post('/events/create', 'EventController@store');
    Route::get('/events/{event}/edit', 'EventController@edit');
    Route::post('/events/{event}/edit', 'EventController@update');
    Route::post('/events/{event}/attend', 'EventController@attend');
    Route::post('/events/{event}/unattend', 'EventController@unattend');

    // Categories
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/create', 'CategoryController@store');
    Route::get('/categories/{category}/edit', 'CategoryController@edit');
    Route::post('/categories/{category}/edit', 'CategoryController@update');

    // User
    Route::get('/profile/{user}', 'UserController@profile');
    Route::get('/events/{user}/edit', 'UserController@edit');
    Route::post('/events/{user}/edit', 'UserController@update');

});

Route::get('sms', function(){
    \SMS::send('This is my message', [], function($sms) {
        $sms->to('+38649681043');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    // Events
    Route::get('events', 'EventController@index');
    Route::get('events/{event}', 'EventController@show');

    // Categories
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/{category}', 'CategoryController@show');

    // Media
    Route::get('media/{filename}/{size?}', 'MediaController@getMedia');
});


Route::group(['prefix' => 'api', 'middleware' => 'api'], function() {

	Route::get('events', 'Api\EventsController@getEvents');
	Route::get('events/{event}', 'Api\EventsController@getEvent');
	Route::post('events', 'Api\EventsController@storeEvent');
	Route::post('events/{event}', 'Api\EventsController@updateEvent');

	Route::get('categories', 'Api\CategoryController@getCategories');
	Route::get('categories/{category}', 'Api\CategoryController@getCategory');

	Route::get('cities', 'Api\CityController@getCities');
	Route::get('cities/{city}', 'Api\CityController@getCity');

	Route::get('countries', 'Api\CountryController@getCountries');
	Route::get('countries/{country}', 'Api\CountryController@getCountry');
	Route::get('countries/{country}/cities', 'Api\CityController@getCitiesByCountry');
});