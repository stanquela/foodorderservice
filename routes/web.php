<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantsController; //Restaurants Controller
use App\Http\Controllers\MealsController; //Meals Controller
use App\Http\Controllers\CartController; //Shopping cart controller
use App\Http\Controllers\OrdersController;  //Orders controller

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


Auth::routes();

Route::get('/', function(){
    return view('welcome');
})->name('welcome');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Routes for restaurants
Route::get('/restaurants',[RestaurantsController::class,'listRestaurants'])->name('restaurants');
Route::get('/show-restaurant/{id}', [RestaurantsController::class, 'showRestaurant'])->name('showRestaurant');


/*ADMIN MIDDLEWARE*/
Route::prefix('admin')->middleware(['auth','is.admin'])->group(function(){
        Route::get('/add-restaurant',[RestaurantsController::class,'addRestaurant'])->name('addRestaurant');
        Route::post('/save-restaurant',[RestaurantsController::class,'saveRestaurant'])->name('saveRestaurant');
        Route::get('/edit-restaurant/{id}', [RestaurantsController::class, 'editRestaurant'])->name('editRestaurant');
        Route::post('/save-edit-restaurant/{id}', [RestaurantsController::class, 'saveEditRestaurant'])->name('saveEditRestaurant');
        Route::delete('/delete-restaurant/{id}', [RestaurantsController::class, 'deleteRestaurant'])->name('deleteRestaurant');
    });


//Routes for meals
Route::get('/meals',[MealsController::class,'listMeals'])->name('meals');
Route::get('/show-meal/{id}', [MealsController::class, 'showMeal'])->name('showMeal');


/*STAFF MIDDLEWARE*/
Route::prefix('staff')->middleware(['auth','is.staff'])->group(function(){
        Route::get('/add-meal',[MealsController::class,'addMeal'])->name('addMeal');
        Route::post('/save-meal',[MealsController::class,'saveMeal'])->name('saveMeal');
        Route::get('/edit-meal/{id}', [MealsController::class, 'editMeal'])->name('editMeal');
        Route::post('/save-edit-meal/{id}', [MealsController::class, 'saveEditMeal'])->name('saveEditMeal');
        Route::delete('/delete-meal/{id}', [MealsController::class, 'deleteMeal'])->name('deleteMeal');
    });

//Routes for cart
Route::get('/show-cart', [CartController::class,'showCart'])->name('showCart');
Route::post('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('addToCart');
Route::post('/delete-from-cart/{$id}', [CartController::class,'deleteFromCart'])->name('deleteFromCart');

//Routes for orders
Route::get('/orders',[OrdersController::class,'listOrders'])->name('orders');
Route::get('/add-order',[OrdersController::class,'addOrder'])->name('addOrder');
Route::post('/save-order',[OrdersController::class,'saveOrder'])->name('saveOrder');
Route::get('/show-order/{id}', [OrdersController::class, 'showOrder'])->name('showOrder');
Route::get('/edit-order/{id}', [OrdersController::class, 'editOrder'])->name('editOrder');
Route::post('/save-edit-order/{id}', [OrdersController::class, 'saveEditOrder'])->name('saveEditOrder');
Route::delete('/delete-order/{id}', [OrdersController::class, 'deleteOrder'])->name('deleteOrder');
Route::post('/confirm-order/{id}', [OrdersController::class, 'confirmOrder'])->name('confirmOrder');
Route::post('/archive-order/{id}', [OrdersController::class, 'archiveOrder'])->name('archiveOrder');

