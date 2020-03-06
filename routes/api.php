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


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
});

Route::group(['middleware' => 'guest:api'], function () {

    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

// API for the Admin Panel
Route::get('/auctions', 'ApiController@getAuctions');

Route::get('/auction/{id}', 'ApiController@getAuction');
// Admin Login API
Route::post('/admin', 'AdminController@login');
// Get All Users for Admin Panel
Route::get('/customers', 'AdminController@getCustomers');
//  Save All bid informations for Admin Panel
Route::post('/bids', 'AdminController@putBids');
//  Get All bid informations for Admin Panel
Route::get('/bids', 'AdminController@getBids');
// Get All Ads for Admin Panel
Route::get('/admin/auction', 'AdminController@getAuction');
// Create the Auctions on Admin Panel
Route::post('/admin/create/auction', 'AdminController@auctionCreate');
// Remove the Auctions on Admin Panel
Route::post('/admin/remove/auction', 'AdminController@auctionRemove');


// Get All Ads for Frontend
Route::get('/ads', 'ApiController@getAds');
// Get One Ad for Frontend
Route::get('/ad/{id}', 'ApiController@getAd');
// Filter function for CAR FOR SALES
Route::post('/date_filter', 'ApiController@filterDate');

// Filter function for Auction
Route::post('/auction_date_filter', 'ApiController@filterAuction');

// Frontend Search Options
Route::post('/brand_filter', 'ApiController@filterCar');
Route::post('/transmission_filter', 'ApiController@transmissionFilter');
Route::post('/kilometer_filter', 'ApiController@kilometerFilter');
Route::post('/year_filter', 'ApiController@yearFilter');
Route::post('/price_filter', 'ApiController@priceFilter');

// Auction Filter Option
Route::post('/auction_brand_filter', 'ApiController@auctionFilterCar');
Route::post('/auction_transmission_filter', 'ApiController@auctionTransmissionFilter');
Route::post('/auction_kilometer_filter', 'ApiController@auctionKilometerFilter');
Route::post('/auction_year_filter', 'ApiController@auctionYearFilter');
Route::post('/auction_price_filter', 'ApiController@auctionPriceFilter');