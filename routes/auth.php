<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// •	コントローラ: RegisteredUserController@store
// •	説明: 新規ユーザーの登録を処理します。このエンドポイントはゲスト（未認証のユーザー）のみアクセス可能です。
// •	ミドルウェア: guest（認証されていないユーザーのみアクセス可能）
Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');

// •	コントローラ: AuthenticatedSessionController@store
// •	説明: ユーザーのログインを処理します。このエンドポイントもゲストのみアクセス可能です。
// •	ミドルウェア: guest
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');

// •	コントローラ: PasswordResetLinkController@store
// •	説明: パスワードリセットリンクのメールを送信します。
// •	ミドルウェア: guest
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

// •	コントローラ: NewPasswordController@store
// •	説明: パスワードリセットを実行します。ユーザーはメールで受け取ったリンクから新しいパスワードを設定します。
// •	ミドルウェア: guest
Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.store');

// •	コントローラ: VerifyEmailController
// •	説明: メールアドレスの確認を処理します。このエンドポイントは、認証されているユーザーがメールに送られたリンクをクリックした際にアクセスします。
// •	ミドルウェア: auth, signed, throttle:6,1（認証済みで署名付きリンクを持ち、1分間に6回までのアクセス制限）
Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

// •	コントローラ: EmailVerificationNotificationController@store
// •	説明: メールアドレス確認のための通知を再送信します。このエンドポイントは認証済みのユーザーのみがアクセス可能です。
// •	ミドルウェア: auth, throttle:6,1
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

// •	コントローラ: AuthenticatedSessionController@destroy
// •	説明: ログアウト処理を行います。このエンドポイントは認証済みのユーザーのみアクセス可能です。
// •	ミドルウェア: auth
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
