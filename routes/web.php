<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cfcontroller;
use App\Http\Controllers\TesMetodeController;
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

//Route::get('test',\App\Http\Controllers\Cfcontroller::class);
//Route::get('mantap', [TesMetodeController::class, 'index']);
Route::get('covid19', [TesMetodeController::class, 'percobaanDua']);
