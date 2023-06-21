<?php

use App\Http\Controllers\Controller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', [Controller::class, 'users']);
Route::post('/Add-user', [Controller::class, 'addUser']);
Route::post('/update-user', [Controller::class, 'updateUser']);
Route::delete('delete-user/{id}', [Controller::class, 'deleteUser']);
Route::get('show-user/{id}', [Controller::class, 'showUser']);


