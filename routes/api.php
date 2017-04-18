<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/v1/categories', v1\CategoryController::class);
Route::resource('/v1/companies', v1\CompanyController::class);
Route::resource('/v1/products', v1\ProductController::class);
Route::resource('/v1/phonenumbers', v1\PhoneNumberController::class);
Route::resource('/v1/emails', v1\EmailController::class);
Route::resource('/v1/productimages', v1\ProductImageController::class);
Route::resource('/v1/productratings', v1\ProductRatingController::class);
Route::resource('/v1/maplocations', v1\MapLocationController::class);