<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\XMLController;
use App\Http\Controllers\SOAPController;
use App\Http\Controllers\MVCController;
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
    return view('layouts/app');
});


Route::get('/xml-example/', [XMLController::class, 'index'])
    ->name('xml_example.index');

Route::get('/soap-example/', [SOAPController::class, 'index'])
    ->name('soap_example.index');

Route::get('/mvc-example/', [MVCController::class, 'index'])
    ->name('mvc_example.index');
