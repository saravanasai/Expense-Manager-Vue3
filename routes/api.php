<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//authentication routes

Route::post('user-registeration',[AuthController::class,'register'])->name('register');


Route::group(["prefix"=>"user","middleware"=>"auth:sanctum"],function ()
{
    Route::post('user-logout',[AuthController::class,'logout'])->name('logout');
});
