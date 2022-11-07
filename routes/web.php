<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
    return view('index');});

    //Route to get the shop page
    Route::get('shop', function () {
        return view('productPage');
    });
    //Route to get the profile page
    Route::get('profile.html', function () {
        return view('user');
    });
    //Route to get the login page
    Route::get('login', function () {
        return view('login');
    });
    //Route to get the register page
    Route::get('register.html', function () {
        return view('register');
    });
    //Route to get the cart page
    Route::get('cart.html', function () {
        return view('cart');
    });
    //Routes for call login and register pages
    Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
    
    Route::get('/profile', [ClientController::class, 'getProfile'])->name('profile');
    //Route to call the logout function 
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['role:user']], function () {

    //Route to get the profile page
    Route::get('profile.html', function () {
        return view('user');
    });
 
    Route::get('/profile', [ClientController::class, 'getProfile'])->name('profile');
    //Route to call the logout function 
    //Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/addPhone', [ProductController::class, 'storeNewPhone']);
    // Route::get('/crud', function () {
    //     return view('Admin.crud');
    // });

    Route::get('/crud', [ProductController::class, 'showProducts'])->name('getProducts');
    Route::post('/delete/{id}', [AdminController::class, 'deletePhone'])->name('deleteProduct'); 
});