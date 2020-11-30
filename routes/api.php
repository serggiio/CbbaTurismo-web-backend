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

});

//ROUTES FOR API/TOURISTICPLACE
//http://localhost:8000/api/touristicPlace
Route::group(['prefix' => 'touristicPlace'], function() {
    //get all data
    Route::post('/getAll', 'TouristicPlaceController@getAll');
    Route::get('/getAll', 'TouristicPlaceController@getAll');
    
    //get touristicPlace/events by Id
    Route::post('/getById', 'TouristicPlaceController@getTouristicPlaceById');
    Route::get('/getById', 'TouristicPlaceController@getTouristicPlaceById');

    //get event data for slider limit 5
    Route::post('/events', 'TouristicPlaceController@store');

    //get todays events
    Route::post('/nowEvents', 'TouristicPlaceController@store');

    //get data for map 
    Route::post('/mapData', 'TouristicPlaceController@store');

    //get data by criterya
    Route::post('/search', 'TouristicPlaceController@search');
    Route::get('/search', 'TouristicPlaceController@search');

    //images
    Route::get('/image', 'TouristicPlaceController@getImage');

    //tags
    Route::post('/tags', 'TouristicPlaceController@getTags');

    //favorite
    Route::post('/checkFavorite', 'TouristicPlaceController@checkFavorite');
    Route::post('/editFavorite', 'TouristicPlaceController@editFavorite');

    //rate by user
    Route::post('/userRate', 'TouristicPlaceController@userRate');
    Route::post('/placesByFav', 'TouristicPlaceController@placesByFav');

    //images tags
    Route::get('/imageTag/{tagName}', 'TouristicPlaceController@getTagImage');
});

Route::get('/testMail', function(){

    return Mail::to("sergioss21er@gmail.com")->send(new welcome("cdngmwuk"));

});




