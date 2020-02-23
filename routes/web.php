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


Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/products', 'ShopController@index')->name('category');

Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::get('/frequently-asked-questions', 'PageController@faq')->name('faq');
Route::get('/terms-and-conditions', 'PageController@terms')->name('terms');
Route::get('/privacy-policy', 'PageController@policy')->name('policy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'HomeController@index')->name('profile');
	Route::patch('/profile', 'UsersController@update')->name('profile.update');

	Route::get('/shipping', 'ShippingController@index')->name('shipping');
	Route::patch('/shipping', 'ShippingController@update')->name('shipping.update');

	Route::get('/orders', 'OrderController@index')->name('orders');
	Route::get('/my-orders/{order}', 'OrderController@show')->name('orders.show');

	Route::get('/buy-store-credit', 'ShopController@buy')->name('buy');
	Route::get('/sell-store-credit', 'ShopController@sell')->name('sell');

	Route::get('/transfer-store-credit', 'TransferController@index')->name('transfer');
	Route::post('/transfer-store-credit', 'TransferController@transfer')->name('transfer.store');

	Route::get('/verify-user', 'PageController@verify')->name('verify');
	Route::post('/verify-user', 'PageController@search')->name('verify.search');

	Route::get('/checkout', 'CheckoutController@index')->name('checkout');
	Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

	Route::get('/confirmation', 'ConfirmationController@index')->name('confirmation');
});


Route::get('/{product}', 'ShopController@show')->name('product');



