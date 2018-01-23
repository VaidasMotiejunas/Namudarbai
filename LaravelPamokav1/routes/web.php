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

Route::get('about', function() {
    $date = '2017-01-01 10:10:10';
    $number = 'AAA111';
    $speed = '120';

    return view('about', compact('date', 'number', 'speed')); //pavadinimai turi sutapti

    // return view('about',
    //  [
    //     'date' => '2017-01-01 10:10:10',
    //     "number" => 'AAA111',
    //      'speed' => 120
    //       ]);
});

Route::get('radars', function(){
    // $radars = [
    //     [ 'number' => 'AAA111', 'speed' => 500 ],
    //     [ 'number' => 'AAA222', 'speed' => 100 ],
    //     [ 'number' => 'AAA333', 'speed' => 200 ],
    //     [ 'number' => 'AAA444', 'speed' => 300 ],
    // ];

    // $radars = DB::table('radars')->get();
    $radars = \App\Radar::all();

    return view('radars', compact('radars'));
});

Route::get('radars/{number}', function($number) {
    // $radar = DB::table('radars')->find($id);
    // $radar = \App\Radar::find($id); //reik paduot id URL ir cia ('radars/{id}', function($id)
    $radar = \App\Radar::where('number', $number)->first();

    return view('radar', compact('radar'));
});

Route::get('drivers', function(){

    $drivers = \App\Driver::all();
    
    return view('drivers', compact ('drivers'));
});

Route::get('drivers/{driverId}', function($driverId){

    $driver = \App\Driver::where('driverId', $driverId)->first();
    
    return view('driver', compact('driver'));
});

Route::get('stations', function(){

    $stations = \App\FuelStation::all();
    
    return view('stations', compact ('stations'));
});

Route::get('stations/{driverId}', function($id){

    $station = \App\FuelStation::where('id', $id)->first();
    
    return view('station', compact('station'));
});



// // Route::get('radars', 'RadarsController@index')->name('radars.index');
// Route::get('radars/create', 'RadarsController@create')->name('radars.create'); //grazina
// Route::post('radars', 'RadarsController@store')->name('radars.store'); //issaugo
// // Route::get('radars/{radar}', 'RadarsController@show')->name('radars.show');
// // Route::get('radars/{radar}/edit', 'RadarsController@edit')->name('radars.edit');
// // Route::put('radars/{radar}', 'RadarsController@update')->name('radars.update');
// // Route::delete('radars/{radar}', 'RadarsController@destroy')->name('radars.destroy');


// // Route::resource('radars', 'RadarsController'); //Jei viskas gerai aprasyta tai uzteka vienos eilutes visiem metodam
