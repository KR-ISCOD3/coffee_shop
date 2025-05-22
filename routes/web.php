<?php

use App\Http\Controllers\Admin\DrinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Users\OrderController;
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

Route::get('/',[LoginController::class,"index"])->name("login");
Route::post('/login',[LoginController::class,"store"])->name('login.store');

Route::get('/register',[RegisterController::class,"index"])->name("register");
Route::post('/register',[RegisterController::class,"store"])->name("register.store");


Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name("dashboard.admin");
    Route::get('/admin/order',[OrderController::class,'index'])->name("order.admin");
    Route::get('/admin/drinks',[DrinkController::class,'index'])->name("drinks.admin");

    Route::post('/admin/drinks',[DrinkController::class,'store'])->name('drinksCreate.admin');
    Route::delete('/admin/drinks/{id}', [DrinkController::class, 'destroy'])->name('drinksDelete.admin');
    
});

Route::middleware(['auth','role:cashier'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name("dashboard.cashier");
    Route::get('/order',[OrderController::class,'index'])->name("order.cashier");
});
