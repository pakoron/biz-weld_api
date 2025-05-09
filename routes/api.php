<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

Route::post('register', [AuthController::class, 'register']);    // 独自の登録API
Route::post('login', [AuthController::class, 'login']);          // 独自のログインAPI

// 認証を必要としないルートグループ
// Route::group([], function () {
//     Route::get('user', [AuthController::class, 'user']);
//     Route::apiResource('customer', 'App\Http\Controllers\CustomerController');
// });

// auth:api を使うことで、Bearer トークン を付けたリクエストだけがアクセスできる
Route::middleware('auth:api')->group(function () {
    // ここにまとめたルートは全て「auth:api」が必要
    Route::get('user', [AuthController::class, 'user']);
    Route::apiResource('customer', 'App\Http\Controllers\CustomerController');
});

// 'oauth'というプレフィックスを持つルートグループを定義→すべてのルートが'/oauth'で始まるように
//passport. という名前空間を持つルートグループを定義
//middleware 'api'を適用して、APIリクエストのみを受け付ける
Route::group(['prefix' => 'oauth', 'as' => 'passport.', 'middleware' => 'api'], function () {
    // アクセストークンを発行
    Route::post('/token', [AccessTokenController::class, 'issueToken'])->name('token');
    // 認可リクエストを受け付ける
    Route::post('/authorize', [AuthorizationController::class, 'authorize'])->name('authorize');
    // 認可を承認
    Route::post('/approve', [ApproveAuthorizationController::class, 'approve'])->name('approve');
    // 認可を拒否
    Route::delete('/deny', [DenyAuthorizationController::class, 'deny'])->name('deny');
    // パーソナルアクセストークンを作成
    Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store'])->name('personal.access-tokens.store');
    // 指定されたトークンIDのパーソナルアクセストークンを削除
    Route::delete('/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy'])->name('personal.access-tokens.destroy');
    // 一時的なトークンを作成
    Route::post('/transient', [TransientTokenController::class, 'store'])->name('transient.store');
});

