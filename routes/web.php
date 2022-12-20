<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController; //Users Controller
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
       //Restaurant manipulation - available only to admin.
        Route::get('/add-restaurant',[RestaurantsController::class,'addRestaurant'])->name('addRestaurant');
        Route::post('/save-restaurant',[RestaurantsController::class,'saveRestaurant'])->name('saveRestaurant');
        Route::get('/edit-restaurant/{id}', [RestaurantsController::class, 'editRestaurant'])->name('editRestaurant');
        Route::post('/save-edit-restaurant/{id}', [RestaurantsController::class, 'saveEditRestaurant'])->name('saveEditRestaurant');
        Route::delete('/delete-restaurant/{id}', [RestaurantsController::class, 'deleteRestaurant'])->name('deleteRestaurant');

        //User manipulation - available only to admin. Adding a new meddleware - single restaurant admin can also be considered.
        Route::get('/users', [UsersController::class,'listUsers'])->name('users');
        Route::get('/add-user', [UsersController::class, 'addUser'])->name('addUser');
        Route::post('/save-user',[UsersController::class, 'saveUser'])->name('saveUser');
        Route::get('/edit-user/{id}', [UsersController::class, 'editUser'])->name('editUser');
        Route::post('/save-edit-user',[UsersController::class, 'saveEditUser'])->name('saveEditUser');
        Route::delete('/delete-user/{id}')->name('deleteUser');
    
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



/*CLIENT MIDDLEWARE (ADMIN IS ALSO ABLE TO ACCESS, STAFF CAN'T USE THE CART, SINCE THERE'S NO NEED.)*/
Route::prefix('staff')->middleware(['auth', 'is.client'])->group(function(){
        
        //Routes for cart        
        Route::get('/show-cart', [CartController::class,'showCart'])->name('showCart');
        Route::post('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('addToCart');
        Route::delete('/delete-from-cart/{id}', [CartController::class,'deleteFromCart'])->name('deleteFromCart');
    });


//THESE ROUTES STILL NEED TO BE PROCESSED.

        //Routes for orders - logic inserted in OrdersController
        //CLIENT can see only the orders they made (including ordered items)
        //STAFF can see only orders that are related to the restaurant they're bond with
        //ADMIN can access everything, ofc.
        Route::get('/orders',[OrdersController::class,'listOrders'])->name('orders');
        Route::post('/add-order',[OrdersController::class,'addOrder'])->name('addOrder');
        Route::post('/save-order',[OrdersController::class,'saveOrder'])->name('saveOrder');
        Route::get('/show-order/{id}', [OrdersController::class, 'showOrder'])->name('showOrder'); 

/*Once the order is made, it can't be changed by client in the DB (for now)*/

Route::delete('/delete-order/{id}', [OrdersController::class, 'deleteOrder'])->name('deleteOrder');
Route::post('/confirm-order/{id}', [OrdersController::class, 'confirmOrder'])->name('confirmOrder');
Route::post('/archive-order/{id}', [OrdersController::class, 'archiveOrder'])->name('archiveOrder');

