<?php

// app()->setLocale('lt') taip keiciame kalba

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

Route::get('/en/login', function () { //Nesamone, bet suranda login jei atsijungiu
    return view('auth/login');
});

Route::get('/en/register', function () { //Nesamone, bet suranda login jei atsijungiu
    return view('auth/register');
});

Auth::routes(); 

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('radars', 'RadarsController'); <---- GALIMA IR TAIP
// Route::get('radars', 'RadarsController@index')->name('radars.index');
// Route::get('radars/create', 'RadarsController@create')->name('radars.create');
// Route::put('radars', 'RadarsController@store')->name('radars.store'); 
// Route::get('radars/{radar}/edit', 'RadarsController@edit')->name('radars.edit');
// Route::put('radars/{radar}', 'RadarsController@update')->name('radars.update'); 
// Route::delete('radars/{radar}', 'RadarsController@destroy')->name('radars.destroy');
// Route::post('radars/{radar}', 'RadarsController@restore')->name('radars.restore');
// Route::get('radars/{radar}', 'RadarsController@show')->name('radars.show');

// // Route::resource('drivers', 'DriversController'); <---- GALIMA IR TAIP
// Route::get('drivers', 'DriversController@index')->name('drivers.index');
// Route::get('drivers/create', 'DriversController@create')->name('drivers.create');
// Route::put('drivers', 'DriversController@store')->name('drivers.store'); 
// Route::get('drivers/{driver}/edit', 'DriversController@edit')->name('drivers.edit');
// Route::put('drivers/{driver}', 'DriversController@update')->name('drivers.update'); 
// Route::delete('drivers/{driver}', 'DriversController@destroy')->name('drivers.destroy');
// Route::post('drivers/{driver}', 'DriversController@restore')->name('drivers.restore');
// Route::get('drivers/{driver}', 'DriversController@show')->name('drivers.show');

// Route::middleware('auth')->group(function(){
// Route::prefix('{lang?}')->middleware(['locale', 'auth'])->group(function(){ //neveikia
// Route::prefix('{lang?}')->middleware('auth')->group(function(){ Veikia tip kaip su middleware('locale') kodel?
Route::prefix('{lang?}')->middleware('locale', 'auth')->group(function(){ //veikia, bet prastai

    // Route::resource('radars', 'RadarsController'); <---- GALIMA IR TAIP
Route::get('radars', 'RadarsController@index')->name('radars.index');
Route::get('radars/create', 'RadarsController@create')->name('radars.create');
Route::put('radars', 'RadarsController@store')->name('radars.store'); 
Route::get('radars/{radar}/edit', 'RadarsController@edit')->name('radars.edit');
Route::put('radars/{radar}', 'RadarsController@update')->name('radars.update'); 
Route::delete('radars/{radar}', 'RadarsController@destroy')->name('radars.destroy');
Route::post('radars/{radar}', 'RadarsController@restore')->name('radars.restore');
Route::get('radars/{radar}', 'RadarsController@show')->name('radars.show');

// Route::resource('drivers', 'DriversController'); <---- GALIMA IR TAIP
Route::get('drivers', 'DriversController@index')->name('drivers.index');
Route::get('drivers/create', 'DriversController@create')->name('drivers.create');
Route::put('drivers', 'DriversController@store')->name('drivers.store'); 
Route::get('drivers/{driver}/edit', 'DriversController@edit')->name('drivers.edit');
Route::put('drivers/{driver}', 'DriversController@update')->name('drivers.update'); 
Route::delete('drivers/{driver}', 'DriversController@destroy')->name('drivers.destroy');
Route::post('drivers/{driver}', 'DriversController@restore')->name('drivers.restore');
Route::get('drivers/{driver}', 'DriversController@show')->name('drivers.show');

Route::get('/language/{language}', 'LanguageController@switch')->name('language.switch');

Route::get('/', function () {
            return view('welcome');
        });

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login', function () { //Neveikia, kodel?
//     return view('login');
// });

});

// Main GET routes with locale
// Route::prefix('{lang?}')->middleware('locale')->group(function() {

//     Route::get('/', function () {
//         return view('index');
//     });
// });
