<?php

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

Route::post('/auth/login', ['App\Http\Controllers\LoginController', 'authenticate']);
//Route::post('/logout', ['App\Http\Controllers\LoginController', 'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/profile/pin', ['App\Http\Controllers\ProfileController', 'updatePin']);
    Route::post('/profile/password', ['App\Http\Controllers\ProfileController', 'updatePassword']);

    Route::resource('referral/settings', \App\Http\Controllers\ReferralSettingController::class);
    Route::resource('referral/requirements', \App\Http\Controllers\ReferralRequirementController::class);
});
