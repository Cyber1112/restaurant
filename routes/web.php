<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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



Route::get('/', [HomeController::class, "index"]);

Route::get('/users', [AdminController::class, "user"]);

Route::get('/foodmenu', [AdminController::class, "foodMenu"]);

Route::get('/view_reservation', [AdminController::class, "viewReservation"]);

Route::get('/view_chef', [AdminController::class, "viewChef"]);

Route::post('/uploadchef', [AdminController::class, "uploadChef"]);

Route::post('/reservation', [AdminController::class, "reservation"]);

Route::get('/deletemenu/{id}', [AdminController::class, "deleteFood"]);

Route::get('/search', [AdminController::class, "search"]);

Route::get('/orders', [AdminController::class, "orders"]);

Route::get('/deletechef/{id}', [AdminController::class, "deleteChef"]);

Route::get('/updateview/{id}', [AdminController::class, "updateView"]);

Route::get('/updatechef/{id}', [AdminController::class, "updateChef"]);

Route::post('/update/{id}', [AdminController::class, "update"]);

Route::post('/renew_chef/{id}', [AdminController::class, "renewChef"]);

Route::post('/uploadfood', [AdminController::class, "uploadFood"]);

Route::post('/addcart/{id}', [HomeController::class, "addCart"]);

Route::post('/orderconfirm', [HomeController::class, "orderConfirm"]);

Route::get('/deleteuser/{id}', [AdminController::class, "deleteUser"]);

Route::get('/show_cart/{id}', [HomeController::class, "showCart"]);

Route::get('/redirects', [HomeController::class, "redirects"]);

Route::get('/remove/{id}', [HomeController::class, "removeFood"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
