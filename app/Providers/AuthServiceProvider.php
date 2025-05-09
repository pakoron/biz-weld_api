<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // ---------------------------------------------
        // パスワードリセット用の URL 設定
        // ---------------------------------------------
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        // ---------------------------------------------
        // 有効期限を設定
        // ---------------------------------------------
        // アクセストークンの有効期限を15日間に設定
        Passport::tokensExpireIn(now()->addDays(15));
        // リフレッシュトークンの有効期限を30日間に設定
        Passport::refreshTokensExpireIn(now()->addDays(30));
        // パーソナルアクセストークンの有効期限を6ヶ月に設定
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));


        //
    }
}
