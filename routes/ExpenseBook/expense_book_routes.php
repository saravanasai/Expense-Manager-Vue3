<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Expense\ExpenseController;
use App\Http\Controllers\Api\ExpenseBook\ExpenseBookController;
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

//expense related routes

Route::group(["prefix"=>"user","middleware"=>"auth:sanctum"],function ()
{
    Route::put('expense-book/share/{id}',[ExpenseBookController::class,'shareBook']);
    Route::apiResource('expense-book',ExpenseBookController::class);

});
