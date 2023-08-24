<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',Function(){
    return redirect()->route('AllData', 1);
});

Route::get('/page/{currentPage}', 'App\Http\Controllers\CreateController@ClientAllData')->name('AllData');

Route::get('/createClient', function () {
    return view('createСlient');
})->name('createClient');

Route::get('/statistic', 'App\Http\Controllers\CreateController@statistic')->name('statistic');

Route::get('/updateСlient/{id}', 'App\Http\Controllers\UpdateController@updateClient')->name('updateСlientData');

Route::post('/updateClient/{id}', 'App\Http\Controllers\UpdateController@submitUpdateClient')->name('successUpdateClient');

Route::get('/createAuto/{id}', 'App\Http\Controllers\CreateController@ClientData')->name('createAuto');

Route::get('/updateAuto/{id}', 'App\Http\Controllers\UpdateController@updateAuto')->name('updateAuto');

Route::post('/updateAuto/{id}', 'App\Http\Controllers\UpdateController@submitUpdateAuto')->name('succesUpdateAuto');

Route::post('/createClient', 'App\Http\Controllers\CreateController@submitClient')->name('successCreateClient');

Route::post('/client/{id}', 'App\Http\Controllers\CreateController@submitAuto')->name('successCreateAuto');

Route::get('/client/{id}', 'App\Http\Controllers\CreateController@oneClient')->name('oneClientData');

Route::get('/client/{id}/delete', 'App\Http\Controllers\DeleteController@deleteClient')->name('deleteClient');

Route::post('/page/{currentPage}', 'App\Http\Controllers\UpdateController@updateStatus')->name('updateStatus');

Route::get('/auto/{id}/delete', 'App\Http\Controllers\DeleteController@deleteAuto')->name('deleteAuto');

