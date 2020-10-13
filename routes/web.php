<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);

// Product
Route::get('/products', 'ProductController@index')->name('products');

Route::get('/products/create', 'ProductController@create')->name('products.create');

Route::post('/products/create', 'ProductController@store')->name('products.store');

Route::delete('/products/{id}', 'ProductController@destroy')->name('products.delete');

Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::put('/products/{id}/edit', 'ProductController@update')->name('products.update');

Route::delete('/products/charges/{id}', 'ProductController@removeCharge')->name('products.charges.delete');

Route::delete('/products/benefits/{id}', 'ProductController@removeBenefit')->name('products.benefits.delete');

// Insurer
Route::get('/', 'InsurerController@index')->name('insurers');

Route::get('/insurers/create', 'InsurerController@create')->name('insurers.create');

Route::post('/insurers/create', 'InsurerController@store')->name('insurers.store');

Route::delete('/insurers/{id}', 'InsurerController@destroy')->name('insurers.delete');

Route::get('/insurers/{id}/edit', 'InsurerController@edit')->name('insurers.edit');

Route::put('/insurers/{id}/edit', 'InsurerController@update')->name('insurers.update');

Route::get('/insurers/{id}/logo', 'InsurerController@logo')->name("insurers.avatar");

// Benefits
Route::get('/benefits', 'BenefitsController@index')->name('benefits');

Route::delete('/benefits/{id}', 'BenefitsController@destroy')->name('benefits.delete');

Route::post('/benefits/create', 'BenefitsController@store')->name('benefits.store');

// Charges
Route::post('/charges/create', 'ChargesController@store')->name('charges.store');

Route::delete('/charges/{id}', 'ChargesController@destroy')->name('charges.delete');

// Settings
Route::get('/settings', 'SettingController@index')->name('settings');

Route::get('/settings/extras', 'ExtrasController@index')->name('settings.extras');

Route::get('/settings/charges', 'ChargesController@index')->name('settings.charges');

Route::delete('/settings/categories/{id}', 'ExtrasController@deleteClassCategory')->name('settings.classes.categories.delete');

Route::delete('/settings/classes/{id}', 'ExtrasController@deleteClassCategory')->name('settings.classes.delete');
