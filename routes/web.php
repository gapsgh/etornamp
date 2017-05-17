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


Route::get('/', 'web\HomeController@index');

Route::get('/map', function () {
    return view('site.pages.mapadd');
});
Route::get('/gal', function () {
    return view('site.pages.gal');
});

Route::resource('categories', web\CategoryController::class);
 Route::get('/all-categories', 'web\CategoryController@allsubs');
 Route::get('categories/{id}/{slug}', 'web\CategoryController@show');

 //Filter page
 Route::get('category/{id}/{slug}', ['as'=>'filer_path','uses'=> 'web\CategoryController@filter']);

//Add Details pagee 
 Route::get('/product/{id}/{slug}', ['as'=>'product_details','uses'=> 'web\ProductController@showDetails']);

 Route::get('/all-featured-products', 'web\HomeController@allfeatured');
 Route::get('/products/create/success', ['as'=>'product_saved_path','uses'=> 'web\ProductController@savesuccess']);
// Route::get('/products/{id}/{slug}', ['as'=>'product_path','uses'=> 'web\ProductController@show']);

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
Route::get('/account/dashboard/my-products',['as'=>'dashboard_myproducts_path','uses'=> 'web\SiteAdminController@myproduct']);
Route::get('/account/dashboard/pending-approval',['as'=>'dashboard_unapproved_path','uses'=> 'web\SiteAdminController@unapproved']);
Route::get('/account/dashboard/approved-ads',['as'=>'dashboard_approved_path','uses'=> 'web\SiteAdminController@approved']);
