<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantsController; //Restaurants Controller

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

//Routes to pages
Route::get('/restaurants',[RestaurantsController::class,'listRestaurants'])->name('restaurants');
Route::get('/add-restaurant',[RestaurantsController::class,'addRestaurant'])->name('addRestaurant');
Route::post('/save-restaurant',[RestaurantsController::class,'saveRestaurant'])->name('saveRestaurant');
Route::get('/show-restaurant/{id}', [RestaurantsController::class, 'showRestaurant'])->name('showRestaurant');
Route::get('/edit-restaurant/{id}', [RestaurantsController::class, 'editRestaurant'])->name('editRestaurant');
Route::post('/save-edit-restaurant/{id}', [RestaurantsController::class, 'saveEditRestaurant'])->name('saveEditRestaurant');
Route::delete('/delete-restaurant/{id}', [RestaurantsController::class, 'deleteRestaurant'])->name('deleteRestaurant');
