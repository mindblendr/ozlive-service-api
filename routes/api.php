<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\PlayerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::prefix('admin')->group(function () {
	Route::group(['middleware' => 'auth:admin'], function () {
		Route::post('/create', [AdminController::class, 'create']);
		Route::get('/me', [AdminController::class, 'me']);
	});
	Route::post('/login', [AdminController::class, 'login']);
});

Route::prefix('player')->group(function () {
	Route::post('/create', [PlayerController::class, 'create']);
	Route::group(['middleware' => 'auth:player'], function () {
		Route::get('/me', [PlayerController::class, 'me']);
	});
	Route::post('/login', [PlayerController::class, 'login']);
});

Route::domain('{subdomain}.' . config('app.short_url'))->group(function () {
	Route::get('/check', function ($subdomain) {
		return $subdomain;
	});
});
