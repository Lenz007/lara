<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::group(['middleware' => ['web']], function () {

    Route::get('/', ['as' => 'front.index', 'uses' => 'FrontController@getIndex']);
    Route::get('post/{slug}', [
        'as' => 'front.single', 
        'uses' => 'FrontController@getSingle'
        ])->where('slug', '[\w\d\-\_]+');



	// Authentication routes
	Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('login', 'Auth\AuthController@postLogin');
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


	// Registration routes
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', 'Auth\AuthController@postRegister');



    //Route::get('post/create', 'PostController@create');

	//Route::get('post', 'PostController@store');
    
    //Route::resource('vpost', 'PostController');


Route::group(['prefix'=>'adminpanel'], function () {
	Route::get('/', [
    	'as' => 'admin.post.index',
    	'uses' => 'PostController@index',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);
    Route::post('/post', [
    	'as' => 'admin.post.store',
    	'uses' => 'PostController@store',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);
    Route::get('/post/create', [
    	'as' => 'admin.post.create',
    	'uses' => 'PostController@create',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);
    Route::put('/post/{slug}', [
    	'as' => 'admin.post.update',
    	'uses' => 'PostController@update',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);
    Route::get('/post/{slug}', [
    	'as' => 'admin.post.show',
    	'uses' => 'PostController@show',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);
    Route::delete('/post/{slug}', [
    	'as' => 'admin.post.destroy',
    	'uses' => 'PostController@destroy',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);
    Route::get('/post/{slug}/edit', [
    	'as' => 'admin.post.edit',
    	'uses' => 'PostController@edit',
    	'middleware' => 'roles',
		'roles' => ['Admin']
    	]);


        
        Route::get('/cat', [
        'as' => 'admin.cat.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'roles',
        'roles' => ['Admin']
        ]);
        Route::post('/cat', [
        'as' => 'admin.cat.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'roles',
        'roles' => ['Admin']
        ]);

	});





Route::get('/contact', 'FrontController@getContact');



	/*Route::auth();*/




//});


