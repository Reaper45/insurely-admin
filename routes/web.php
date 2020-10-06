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

Route::get('/', 'ProductController@index')->name('products');

Route::post('/products/create', 'ProductController@create')->name('products.create');

Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');

Route::put('/products/edit', 'ProductController@update')->name('products.update');

// Insurer
Route::get('/insurers', 'InsurerController@index')->name('insurers');

Route::post('/insurers/{id}', 'InsurerController@destroy')->name('insurers.delete');

Route::get('/insurers/{id}/logo/', 'InsurerController@logo')->name("insurers.avatar");

Route::get('/insurers/create', 'InsurerController@create')->name('insurers.create');

Route::post('/insurers/create', 'InsurerController@store')->name('insurers.store');

Route::get('/insurers/edit/{id}', 'InsurerController@edit')->name('insurers.edit');

Route::put('/insurers/edit', 'InsurerController@update')->name('insurers.update');

// Extras
Route::get('/extras', 'ExtrasController@index')->name('extras');

// Benefits
Route::get('/benefits', 'BenefitsController@index')->name('benefits');

// Settings
Route::get('/settings', 'SettingController@index')->name('settings');
  
Route::get('/settings/benefits', 'SettingController@benefits')->name('settings.benefits');

Route::get('/settings/{class_id}', 'SettingController@insuranceClass')->name('settings.class');

