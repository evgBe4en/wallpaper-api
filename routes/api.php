<?php

use App\Http\Controllers\WallpaperController;
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

Route::resource('wallpapers', WallpaperController::class);
Route::resource('firebase', \App\Http\Controllers\FirebaseController::class);
//Route::get('/run-migration', function () {
//    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
//    \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
//
//    return "Migration executed successfully!";
//});
