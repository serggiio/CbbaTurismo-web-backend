<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcome;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('/', 'MainController@index');

//enable all routes/method from userTableController
//Route::resource('userTable', 'UserTableController');
//User data for api
Route::Apiresource('userTable', 'UserTableController');
//Touristic data for api
//Route::Apiresource('touristicPlaces', 'TouristicPlaceController');

//ROUTES FOR API/USERS MODULE
//http://localhost:8000/api/getUser
Route::post('/getUser', 'UserTableController@getUserById');

Route::group(['prefix' => 'users'], function() {
    //get userData from id
    Route::post('/getUser', 'UserTableController@getUserById');
    
    //save user
    Route::post('/saveUser', 'UserTableController@store');
    Route::post('/verificateCode', 'UserTableController@verificateCode');

    //authenticate user
    Route::post('/authentication', 'UserTableController@authentication');

    //update user data
    Route::post('/update', 'UserTableController@update');

    //Reset password for user
    Route::post('/resetPassword', 'UserTableController@resetPassword');

});

//ROUTES FOR API/TOURISTICPLACE
//http://localhost:8000/api/touristicPlace
Route::group(['prefix' => 'touristicPlace', 'middleware' => 'cors'], function() {
    //get all data
    Route::middleware('cors')->post('/getAll', 'TouristicPlaceController@getAll');
    Route::get('/getAll', 'TouristicPlaceController@getAll');
    
    //get touristicPlace/events by Id
    Route::post('/getById', 'TouristicPlaceController@getTouristicPlaceById');
    Route::get('/getById', 'TouristicPlaceController@getTouristicPlaceById');

    //get todays events
    Route::get('/events', 'TouristicPlaceController@getAllEvents');

    //get data for map 
    Route::post('/mapData', 'TouristicPlaceController@store');

    //get data by criterya
    Route::post('/search', 'TouristicPlaceController@search');
    Route::get('/search', 'TouristicPlaceController@search');
    Route::post('/searchByLocation', 'TouristicPlaceController@searchByLocation');

    //images
    Route::get('/image', 'TouristicPlaceController@getImage');
    Route::get('/mainImage/{id}', 'TouristicPlaceController@getMainImage');
    Route::get('/image/{id}', 'TouristicPlaceController@getImageById');

    //tags
    Route::post('/tags', 'TouristicPlaceController@getTags');

    //category
    Route::post('/categories', 'TouristicPlaceController@getCategories');

    //favorite
    Route::post('/checkFavorite', 'TouristicPlaceController@checkFavorite');
    Route::post('/editFavorite', 'TouristicPlaceController@editFavorite');

    //rate by user
    Route::post('/userRate', 'TouristicPlaceController@userRate');
    Route::post('/placesByFav', 'TouristicPlaceController@placesByFav');

    //images tags
    Route::get('/imageTag/{tagName}', 'TouristicPlaceController@getTagImage');

    //commentary
    Route::post('/commentsByTouristicPlaceId', 'TouristicPlaceController@getCommentsByTouristicPlace');
    Route::post('/modifyCommentary', 'TouristicPlaceController@setCommentary');

    Route::post('/testMaps', 'TouristicPlaceController@testMaps');
    Route::get('/testMaps', 'TouristicPlaceController@testMaps');

    //images products
    Route::get('/productImg/{id}', 'TouristicPlaceController@getProductImage');
});

    //Route::get('/App', 'TouristicPlaceController@getApp');
    Route::get('/App', [

        'as' 	=> 		'Api.App',
        'uses'	=>		'TouristicPlaceController@getApp'
        
    ]);

Route::get('/testMail', function(){

    return Mail::to("sergioss21er@gmail.com")->send(new welcome("cdngmwuk"));

});




