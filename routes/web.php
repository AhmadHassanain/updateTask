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

Route::get('/', 'HomeController@index')->name('home');

Route::get('customers', 'CustomerController@index')->name('customers');

Route::post('add_customer', 'CustomerController@addCustomer')->name('add_customer');
Route::put('{id}/update_customer/', 'CustomerController@updateCustomer')->name('update_customer');

Route::get('{id}/editCut/', 'CustomerController@edit')->name('editCut');
