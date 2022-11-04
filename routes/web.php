<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantsController; //Restaurants Controller
use App\Http\Controllers\MealsController; //Meals Controller

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

//Routes for restaurant
Route::get('/restaurants',[RestaurantsController::class,'listRestaurants'])->name('restaurants');
Route::get('/add-restaurant',[RestaurantsController::class,'addRestaurant'])->name('addRestaurant');
Route::post('/save-restaurant',[RestaurantsController::class,'saveRestaurant'])->name('saveRestaurant');
Route::get('/show-restaurant/{id}', [RestaurantsController::class, 'showRestaurant'])->name('showRestaurant');
Route::get('/edit-restaurant/{id}', [RestaurantsController::class, 'editRestaurant'])->name('editRestaurant');
Route::post('/save-edit-restaurant/{id}', [RestaurantsController::class, 'saveEditRestaurant'])->name('saveEditRestaurant');
Route::delete('/delete-restaurant/{id}', [RestaurantsController::class, 'deleteRestaurant'])->name('deleteRestaurant');

//Routes for meals
Route::get('/meals',[MealsController::class,'listMeals'])->name('meals');
Route::get('/add-meal',[MealsController::class,'addMeal'])->name('addMeal');
Route::post('/save-meal',[MealsController::class,'saveMeal'])->name('saveMeal');
Route::get('/show-meal/{id}', [MealsController::class, 'showMeal'])->name('showMeal');
Route::get('/edit-meal/{id}', [MealsController::class, 'editMeal'])->name('editMeal');
Route::post('/save-edit-meal/{id}', [MealsController::class, 'saveEditMeal'])->name('saveEditMeal');
Route::delete('/delete-meal/{id}', [MealsController::class, 'deleteMeal'])->name('deleteMeal');

