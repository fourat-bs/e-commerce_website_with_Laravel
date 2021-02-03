<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home','PagesController@home');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/menu','ItemsController@menu');
Route::get('/cart','ItemsController@cart');
Route::get('add-to-cart/{id}','ItemsController@addToCart');
Route::patch('update-cart', 'ItemsController@update'); 
Route::delete('remove-from-cart', 'ItemsController@remove');
Route::post('/cart','PaymentController@submit');
Route::get('/checkout','PaymentController@checkout');
Route::post('/checkout','PaymentController@charge');
Route::get('/contact', 'MessagesController@contact');
Route::post('/contact', 'MessagesController@submit');
Route::get('/r','MessagesController@thanks');
Route::get('/register','RegisterController@create');
Route::post('/register','RegisterController@store');
Route::get('/login','SessionsController@create');
Route::get('/myaccount','SessionsController@thisuser');

Route::post('/myaccount','SessionsController@submit');
Route::post('/login','SessionsController@authenticate');
Route::get('/logout','SessionsController@destroy');
Route::get('/admin','AdminCOntroller@admin');
Route::post('/insert','AdminCOntroller@insertpost');
Route::get('/insert','AdminCOntroller@insert');
Route::post('/update','AdminCOntroller@updatepost');
Route::get('/update','AdminCOntroller@update');
Route::post('/delete','AdminCOntroller@deletepost');
Route::get('/delete','AdminCOntroller@delete');



