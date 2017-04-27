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

Route::get('/', function () {
    return view('site.pages.home');
});

Route::resource('categories', web\CategoryController::class);
Route::resource('companies', web\CompanyController::class);
Route::resource('products', web\ProductController::class);
Route::resource('phonenumbers', web\PhoneNumberController::class);
Route::resource('emails', web\EmailController::class);
Route::resource('productimages', web\ProductImageController::class);
Route::resource('productratings', web\ProductRatingController::class);
Route::resource('maplocations', web\MapLocationController::class);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/account/dashboard',['as'=>'dashboard_path','uses'=> 'web\SiteAdminController@index']);
