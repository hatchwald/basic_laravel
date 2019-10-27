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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'HomeController@form_a')->name('product');
Route::get('/customer', 'HomeController@form_b')->name('customer');
Route::post('/product','HomeController@form_ins_prd')->name('ins_form_a');
Route::post('/customer','HomeController@form_cust')->name('ins_form_b');
Route::get('/sales','HomeController@sales')->name('sales');
Route::post('/sales','HomeController@sales_ins')->name('sales_inst');