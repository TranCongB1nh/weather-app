<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherAppController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', [WeatherAppController::class, 'index'])->name('home');
Route::post('/search', [WeatherAppController::class, 'search'])->name('weather.search');
Route::get('/subscribe', function () {
    return view('weather-forecast.subscribe');
});

Route::post('/subscribe', [WeatherAppController::class, 'subscribe'])->name('subscribe');
Route::view('/subscribe/success', 'weather-forecast.subscribe_success')->name('subscribe.success');
