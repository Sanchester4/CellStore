<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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
    //Route to get all products
    Route::get('shop', [ProductController::class, 'getProductsShop'])->name('getProductsShop');

    Route::get('/product', function () {
        return view('singleProductPage');
    });
    
    Route::get('/profile', [ClientController::class, 'getProfile'])->name('profile');

    Route::get('/shop/product/{id}', [ProductController::class, 'getProductById'])->name('getProductById'); 

    Route::get('/cart', [CartController::class, 'getCart'])->name('getCart');
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/deleteFromCart', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');



Route::group(['middleware' => ['role:user']], function () {

    //Route to get the profile page
    Route::get('profile.html', function () {
        return view('user');
    });
    Route::get('/wishlist', [ClientController::class, 'getWishlist'])->name('getWishlist');
    Route::post('/deleteFromWishList', [ClientController::class, 'deleteFromWishList'])->name('deleteFromWishList');
    Route::post('/addToWishList', [ClientController::class, 'addToWishList'])->name('addToWishList');
    Route::get('/checkout', [ClientController::class, 'getCheckout'])->name('getCheckout');
    Route::post('/addOrder', [ClientController::class, 'addOrder'])->name('addOrder');
    Route::get('/category/Apple', [ClientController::class, 'getByCategoryApple'])->name('getByCategoryApple');
    Route::get('/category/Samsung', [ClientController::class, 'getByCategorySamsung'])->name('getByCategorySamsung');
    Route::get('/category/Huawei', [ClientController::class, 'getByCategoryHuawei'])->name('getByCategoryHuawei');
    Route::get('/contact-form', [ClientController::class, 'getContactUsPage'])->name('getContactUsPage');
    Route::post('/contact', 'ClientController@send_mail')->name('addContact');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //::get('/crud', [AdminController::class, 'dashboard'])->name('crud');
    Route::post('/addPhone', [ProductController::class, 'storeNewPhone']);
    Route::get('/crud', [ProductController::class, 'showProducts'])->name('getProducts');
    //Route for delete the item phone
    Route::post('/delete/{id}', [AdminController::class, 'deletePhone'])->name('deleteProduct');
    Route::put('/updatePhone', [ProductController::class, 'updatePhone'])->name('updatePhone');


});