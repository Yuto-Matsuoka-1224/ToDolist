<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TwitterController; 

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

//Route::get('/auth/twitter', [TwitterController::class,'redirectToProvider']);
//Route::get('/auth/twitter/callback', [TwitterController::class,'handleProviderCallback']);
//Route::get("/auth/twitter/logout",[TwitterController::class,'logout']);

// Twitter ログインURL
Route::get('/auth/twitter', [TwitterController::class,'redirectToProvider']);
// Twitter コールバックURL
Route::get('/auth/twitter/callback', [TwitterController::class,'handleProviderCallback']);
// Twitter ログアウトURL
Route::get('/auth/twitter/logout', [TwitterController::class,'logout']);
