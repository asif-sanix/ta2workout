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


// Route::get('/', function () {
//     return view('web.home');
// })->name('home');


Route::group(['namespace' => 'Web'],function(){
	Route::get('/','HomeController@home')->name('home');
});










// Route::group(['namespace' => 'Web','prefix'=>'api'],function(){

// 	Route::post('contact/store','ContactController@store');
// 	Route::post('contact','ContactController@index');
// 	Route::post('contact/store','ContactController@store');
// 	Route::post('site-details','SiteDetailsController@siteDetails');
// 	Route::post('slider','SiteDetailsController@slider');
// 	Route::post('post','PostController@posts');
// 	Route::post('post/{post}','PostController@singlePost');

// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// if(Request()->segment(1) != 'admin'){
//     Route::view('/{react}','master');
//     Route::view('{react}/{sub}','master');	
// }

