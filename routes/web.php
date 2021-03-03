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

Route::post('/logouts', 'MainController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    
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

    //delete user
    Route::get('user/{id}/destroy', [
        'as'	=>	'admin.user.destroy',
        'uses'	=>	'FrontController@destroyUser'
    ]);

    //edit user
    Route::get('/user/{id}', [

        'as' 	=> 		'front.user.detail',
        'uses'	=>		'FrontController@userDetail'
        
    ]);

    //store updated user
    Route::post('/storeUpdatedUser', [

        'as' 	=> 		'front.storeUpdatedUser',
        'uses'	=>		'FrontController@saveUpdatedUser'
        
    ]);

    //edit, delete place
    Route::get('/placeDetail/{id}',[

        'as' 	=> 		'front.placeDetail',
        'uses'	=>		'FrontController@placeDetail',
        
    ]);

    //delete place
    Route::get('place/{id}/destroy', [
        'as'	=>	'admin.place.destroy',
        'uses'	=>	'FrontController@destroyPlace'
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

    //create image
    Route::post('/createImage', [

        'as' 	=> 		'front.createImage',
        'uses'	=>		'FrontController@createImage'
        
    ]);

    //tags
    Route::get('/tags', [

        'as' 	=> 		'front.tags',
        'uses'	=>		'FrontController@tags'
        
    ]);

    //delete tag
    Route::get('tag/{id}/destroy', [
        'as'	=>	'admin.tag.destroy',
        'uses'	=>	'FrontController@destroyTag'
    ]);

    //edit, delete tag
    Route::get('/tagDetail/{id}', [

        'as' 	=> 		'front.tagDetail',
        'uses'	=>		'FrontController@tagDetail'
        
    ]);

    Route::post('/storeUpdatedTag', [

        'as' 	=> 		'front.storeUpdatedTag',
        'uses'	=>		'FrontController@saveUpdatedTag'
        
    ]);

    //create tag
    Route::post('/createTag', [

        'as' 	=> 		'front.createTag',
        'uses'	=>		'FrontController@createTag'
        
    ]);



    //provinces
    Route::get('/provinces', [

        'as' 	=> 		'front.provinces',
        'uses'	=>		'FrontController@provinces'
        
    ]);

    //delete tag
    Route::get('province/{id}/destroy', [
        'as'	=>	'admin.province.destroy',
        'uses'	=>	'FrontController@destroyProvince'
    ]);

    //edit, delete tag
    Route::get('/provinceDetail/{id}', [

        'as' 	=> 		'front.provinceDetail',
        'uses'	=>		'FrontController@provinceDetail'
        
    ]);

    Route::post('/storeUpdatedProvince', [

        'as' 	=> 		'front.storeUpdatedProvince',
        'uses'	=>		'FrontController@saveUpdatedProvince'
        
    ]);

    //create province
    Route::post('/createProvince', [

        'as' 	=> 		'front.createProvince',
        'uses'	=>		'FrontController@createProvince'
        
    ]);


    //categories
    Route::get('/categories', [

        'as' 	=> 		'front.categories',
        'uses'	=>		'FrontController@categories'
        
    ]);

    //create category
    Route::post('/createCategory', [

        'as' 	=> 		'front.createCategory',
        'uses'	=>		'FrontController@createCategory'
        
    ]);

    //edit, category
    Route::get('/categoryDetail/{id}', [

        'as' 	=> 		'front.categoryDetail',
        'uses'	=>		'FrontController@categoryDetail'
        
    ]);

    //save updated category
    Route::post('/storeUpdatedCategory', [

        'as' 	=> 		'front.storeUpdatedCategory',
        'uses'	=>		'FrontController@storeUpdatedCategory'
        
    ]);

    //delete category
    Route::get('category/{id}/destroy', [
        'as'	=>	'admin.category.destroy',
        'uses'	=>	'FrontController@destroyCategory'
    ]);

    //delete commentary
    Route::get('commentary/{id}/destroy', [
        'as'	=>	'admin.commentary.destroy',
        'uses'	=>	'FrontController@destroyCommentary'
    ]);

    //reports main page
    //categories
    Route::get('/reports', [
        'as' 	=> 		'front.reports',
        'uses'	=>		'FrontController@reports'
    ]);

    //generate repdf report
    Route::get('/generateReport', [
        'as' 	=> 		'front.generateReport',
        'uses'	=>		'FrontController@generateReport'
    ]);
    

});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
