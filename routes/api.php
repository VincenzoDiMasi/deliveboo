<?php

use App\Http\Controllers\Api\DelivebooController;
use App\Http\Controllers\Api\RestaurantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/types', [DelivebooController::class, 'sendRestaurantTypes']);
Route::get('/restaurants/types', [DelivebooController::class, 'sendFilteredRestaurants']);
Route::get('/restaurants/{slug}', [DelivebooController::class, 'sendRestaurantDishes']);
Route::post('/new-order', [DelivebooController::class, 'createNewOrder']);

Route::get('/restaurants', [RestaurantsController::class, 'index']);
