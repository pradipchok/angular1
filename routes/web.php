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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/welcome', 'HomeController@welcome')->name('home.welcome');
//Route::middleware(['CheckLive'])->group(function () {
	Route::get('/', 'HomeController@home')->name('home.index');
	Route::get('/careers', 'HomeController@careers')->name('careers.index');
	Route::get('/about-us', 'HomeController@aboutUs')->name('aboutus.index');
	Route::post('/search', 'HomeController@search')->name('search.index');

	Route::get('/contact-us', 'ContactUsController@index')->name('contactus.index');
	Route::post('/contact-us', 'ContactUsController@store')->name('contactus.store');

	Route::get('/services/{id}/{category}', 'ServicesController@details')->name('service.details');
	Route::get('/products/{id}/{product}', 'ProductController@details')->name('product.details');

	Route::get('/news-article', 'NewsController@allnews')->name('news.all');
	Route::get('/news-article/{id}/{news}', 'NewsController@details')->name('news.details');
//});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	// Admin route
	Route::get('/home', 'HomeController@index')->name('home');   
	Route::resource('/content', 'ContentController');  
	Route::resource('/news', 'NewsController');  
	Route::resource('/service', 'ServicesController');  
	Route::resource('/banner', 'BannerController'); 
	Route::resource('/company', 'CompanyController'); 
	Route::resource('/product', 'ProductController');
});
