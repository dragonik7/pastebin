<?php

use App\Http\Controllers\CodesController;
use App\Http\Controllers\UserController;
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
$user = \Request::header('Authorization') ? 'auth:sanctum' : 'api';
Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
	return $request->user();
});

Route::group(['prefix' => '/user'], function ()
{
	Route::post('/register', [UserController::class, 'store']);
	Route::post('/login', [UserController::class, 'login']);
});
Route::group(['prefix' => '/code'], function () use ($user)
{
	Route::get('/', [CodesController::class, 'getPublicCodes']);
	Route::post('/', [CodesController::class, 'store'])->middleware($user);
	Route::get('/{code}', [CodesController::class, 'show'])->middleware($user);
	Route::post('/{code}', [CodesController::class, 'update']);
	Route::delete('/{code}', [CodesController::class, 'destroy']);
});