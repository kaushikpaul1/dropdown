<?php

use App\Http\Controllers\maincontroller;
use App\Http\Controllers\mastercontroller;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [maincontroller::class, 'index']);


Route::post('/fetch-dist/{id}', [maincontroller::class, 'fetchDist']);
Route::post('/fetch-subdiv/{id}', [maincontroller::class, 'fetchDiv']);
Route::post('/fetch-munci/{id}', [maincontroller::class, 'fetchMunci']);
Route::post('/fetch-block/{id}', [maincontroller::class, 'fetchBlock']);
Route::post('/fetch-ward/{id}', [maincontroller::class, 'fetchWard']);
Route::post('/fetch-gp/{id}', [maincontroller::class, 'fetchGP']);
Route::post('/fetch-sc/{id}', [maincontroller::class, 'fetchSc']);
Route::post('/fetch-st/{id}', [maincontroller::class, 'fetchSt']);
Route::post('/fetch-obc/{id}', [maincontroller::class, 'fetchObc']);
Route::post('/fetch-caste/{id}', [maincontroller::class, 'fetchCaste']);
Route::post('/get-dist/{id}', [maincontroller::class, 'getDist']);


// for form sending data
Route::post('/home', [mastercontroller::class, 'store'])->name('form.submit');
// Route::get('/view', [mastercontroller::class, 'view']);

// for fetching data from database
Route::get('/showdata', [mastercontroller::class, 'show']);



