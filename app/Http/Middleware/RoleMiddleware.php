<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Laravelでは、リクエストが認証されたユーザーを取得するために$request->user()メソッドを使用します。このメソッドは、現在認証されているユーザーのインスタンス（Userモデル）を返します。
        // •	例: ユーザーがログインしている場合、$request->user()はそのユーザーの情報を持つUserオブジェクトを返します。ログインしていない場合、nullを返します。

        // •	$request->user()->roleは、認証されたユーザーのロール（役割）を取得します。例えば、roleカラムにadmin、userなどの値が設定されているとします。
        // •	$request->user()->role !== $roleは、現在のユーザーのロールが指定された$roleと異なる場合にtrueとなります。

        // •	この条件は、次の2つの状況をチェックしています：
        // 1.	ユーザーが認証されていない（ログインしていない）場合
        // 2.	ユーザーがログインしているが、そのロールが指定された$roleと一致しない場合
        if (! $request->user() || $request->user()->role !== $role) {
            return redirect('/'); // 権限がない場合はリダイレクト
        }

        return $next($request);
    }
}
