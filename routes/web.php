<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\ContinousProbability;
use App\Http\Controllers\ItemController;

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

Route::get('/', [ItemController::class, 'index']);
Route::post('/', [ItemController::class, 'diagnose']);

Route::get('/learning', [ItemController::class, 'learning']);
Route::get('/learning/discrete_probability', [ItemController::class, 'discrete_probability']);
Route::get('/learning/continous_probability', [ItemController::class, 'continous_probability']);
Route::get('/learning/prediction', [ItemController::class, 'prediction']);
Route::get('/about', [ItemController::class, 'about']);

// test
