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

/*
Route::get('/', function () {
    return view('index');
});
*/

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/boutique','ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', 'ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');

Route::group(['middleware' => ['auth']], function () {
Route::get('/panier','CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/merci', 'CartController@liraison')->name('livraisons');

/*
Route::get('/merci',function(){
    Cart::destroy();
    return view('checkout.thankyou');
})->name('checkout.thankyou');
*/
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
