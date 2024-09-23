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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// adminロールのみがアクセス可能なルートを定義する場合
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', function () {
//         // Admin画面の処理
//     });
// });

Route::apiResource('customer', 'App\Http\Controllers\CustomerController');
