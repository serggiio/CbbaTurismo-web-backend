<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');

Route::get('/getAll', 'TouristicPlaceController@getAll');



Route::group(['prefix' => 'admin'], function() {
    
    //routes for web admin
    Route::get('/', [

        'as' 	=> 		'front.index',
        'uses'	=>		'FrontController@index'
        
    ]);

    Route::get('/registerNewPlace', [

        'as' 	=> 		'front.newPlace',
        'uses'	=>		'FrontController@registerNewPlace'
        
    ]);

    Route::post('/storeNewPlace', [

        'as' 	=> 		'front.storeNewPlace',
        'uses'	=>		'FrontController@saveNewPlace'
        
    ]);

    //users module
    Route::get('/users', [

        'as' 	=> 		'front.users',
        'uses'	=>		'FrontController@users'
        
    ]);

    Route::get('/registerNewUser', [

        'as' 	=> 		'front.newUser',
        'uses'	=>		'FrontController@registerNewUser'
        
    ]);

    Route::post('/storeNewUser', [

        'as' 	=> 		'front.storeNewUser',
        'uses'	=>		'FrontController@saveNewUser'
        
    ]);

    //edit, delete place
    Route::get('/placeDetail/{id}', [

        'as' 	=> 		'front.placeDetail',
        'uses'	=>		'FrontController@placeDetail'
        
    ]);

    Route::post('/storeUpdatedPlace', [

        'as' 	=> 		'front.storeUpdatedPlace',
        'uses'	=>		'FrontController@saveUpdatedPlace'
        
    ]);

    //create gallery
    Route::post('/createGallery', [

        'as' 	=> 		'front.createGallery',
        'uses'	=>		'FrontController@createGallery'
        
    ]);

    //delete gallery
    Route::get('gallery/{id}/destroy', [
		'as'	=>	'admin.gallery.destroy',
		'uses'	=>	'FrontController@destroyGallery'
    ]);
    
    //edit gallery
    Route::get('gallery/{id}', [
        'as'	=>	'admin.gallery.edit',
        'uses'	=>	'FrontController@editGallery'
    ]);

    //delete image
    Route::get('galleryImage/{id}/destroy', [
        'as'	=>	'admin.galleryImage.destroy',
        'uses'	=>	'FrontController@destroyGalleryImage'
    ]);

    

});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

