<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth:web'], function() {
    Route::resource('books', BookController::class);
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'listSubmitted'])->name('orders.submitted');
});

    // // Route::middleware('auth')->group(function() {
        
    // // });
    // Route::resource('books', BookController::class)->middleware('auth:web');
