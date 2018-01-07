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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\ProfileAuthController@getLogin');
Route::post('auth/login', 'Auth\ProfileAuthController@postLogin');
Route::get('auth/logout', 'Auth\ProfileAuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\ProfileAuthController@getRegister');
Route::post('auth/register', 'Auth\ProfileAuthController@postRegister');

//routes for rating, PART of Rate_and_Review Module
Route::get('rate/fetch_citeria', 'RateController@fetchCiteria');
Route::post('rate/fetchCiteria', 'RateController@fetchCiteria');
Route::post('rate/submit_Rate_and_Review', 'RateController@submit_Rate_and_Review');

Route::get('add','addController@viewAdd');

Route::get('viewMostViewed','HomeController@viewMostViewed');
Route::get('viewMostRecent','HomeController@viewMostRecent');
Route::get('viewMostRated','HomeController@viewMostRated');
Route::get('Laptop','HomeController@laptop');
Route::get('Mobile','HomeController@mobile');
Route::get('Book','HomeController@book');

Route::get('addreqcon/{id}','addController@confirm');
Route::get('addreqdel/{id}','addController@del');
Route::get('addpromote/{id}','addController@promote');

Route::get('addSpec','addSpecController@viewSpec');
Route::post('addSpec/addCat', ['as' => 'add.cat' , 'uses' => 'addSpecController@viewAfterCatAdd']);
Route::post('addSpec/addSpec', ['as' => 'add.spec' , 'uses' => 'addSpecController@viewAfterSpecAdd']);
Route::post('addSpec/addCrit', ['as' => 'add.crit' , 'uses' => 'addSpecController@viewAfterCritAdd']);
Route::post('addSpec/addSpecVal', ['as' => 'add.specVal' , 'uses' => 'addSpecController@viewSpecVal']);


Route::post('add/submit/{id}{admin}', ['as' => 'add.submit' , 'uses' => 'addController@viewAfterSubmit']);




Route::get('advanced_search','addController@viewSearch');

Route::post('search','addController@singleSearch');
Route::post('rate','addController@rate');
Route::post('review','detailsProductController@review');


Route::get('profile', 'profileController@viewProfile');
Route::post('profile/addImage/{id}', ['as' => 'image.store' , 'uses' => 'profileController@storeImage']);
Route::post('profile/saveName/{id}', 'profileController@saveName');
Route::post('profile/savePass/{id}', 'profileController@savePass');
Route::post('profile/addPref/{id}', ['as' => 'add.pref' , 'uses' => 'profileController@storePref']);
Route::post('profile/addPref/{id}', ['as' => 'add.pref' , 'uses' => 'profileController@storePref']);


Route::get('detailsProfile/{id}', 'detailsProfileController@viewProfile');
Route::get('detailsProduct/{id}', 'detailsProductController@viewProduct');
Route::post('detailsProduct/{u_id}{p_id}', ['as' => 'reviewSubmit' , 'uses' => 'detailsProductController@review']);

Route::get('panel','panelController@viewPanel');

Route::get('faq', function () {
    return view('faq');
});
Route::get('privacy', function () {
    return view('privacy');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('terms', function () {
    return view('terms');
});
Route::get('feedback', function () {
    return view('feedback');
});
Route::get('about', function () {
    return view('about');
});















