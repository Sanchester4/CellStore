<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
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
    return view('index');
});

Route::get('shop', function () {
    return view('productPage');
});

Route::get('profile.html', function () {
    return view('user');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register.html', function () {
    return view('register');
});

Route::get('cart.html', function () {
    return view('cart');
});

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');


Route::get('/profile', [ClientController::class, 'getProfile'])->name('profile');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

