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
Route::get('/products', 'ProductsController@index')->name('products');

Route::get('/products/create', 'ProductsController@create')->name('products.create');

Route::post('/products/create', 'ProductsController@store')->name('products.store');

Route::delete('/products/{id}', 'ProductsController@destroy')->name('products.delete');

Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');

Route::put('/products/{id}/edit', 'ProductsController@update')->name('products.update');

Route::delete('/products/charges/{id}', 'ProductsController@removeCharge')->name('products.charges.delete');

Route::delete('/products/benefits/{id}', 'ProductsController@removeBenefit')->name('products.benefits.delete');

// Insurer
Route::get('/', 'InsurersController@index')->name('insurers');

Route::get('/insurers/create', 'InsurersController@create')->name('insurers.create');

Route::post('/insurers/create', 'InsurersController@store')->name('insurers.store');

Route::delete('/insurers/{id}', 'InsurersController@destroy')->name('insurers.delete');

Route::get('/insurers/{id}/edit', 'InsurersController@edit')->name('insurers.edit');

Route::put('/insurers/{id}/edit', 'InsurersController@update')->name('insurers.update');

Route::get('/insurers/{id}/logo', 'InsurersController@logo')->name("insurers.avatar");

// Benefits
Route::get('/benefits', 'BenefitsController@index')->name('benefits');

Route::delete('/benefits/{id}', 'BenefitsController@destroy')->name('benefits.delete');

Route::post('/benefits/create', 'BenefitsController@store')->name('benefits.store');

// Charges
Route::post('/charges/create', 'ChargesController@store')->name('charges.store');

Route::delete('/charges/{id}', 'ChargesController@destroy')->name('charges.delete');

// Catagories
Route::post('/categories/create', 'CategoriesController@store')->name('categories.store');

// Settings
Route::get('/settings', 'SettingsController@index')->name('settings');

Route::get('/settings/extras', 'ExtrasController@index')->name('settings.extras');

Route::get('/settings/charges', 'ChargesController@index')->name('settings.charges');

Route::delete('/settings/categories/{id}', 'ExtrasController@deleteClassCategory')->name('settings.classes.categories.delete');

Route::delete('/settings/classes/{id}', 'ExtrasController@deleteClassCategory')->name('settings.classes.delete');
