<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // 'paths' => ['*'],
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    // 'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],
    // 'allowed_origins' => [env('FRONTEND_URL')],
    'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],


    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

//     Bearer トークンを Authorization ヘッダー に付与して認証を行っているため、Cookie による認証情報の送信が不要 です。この場合、
// 	•	Cookie を使わない（＝クレデンシャルを渡さない）
// 	•	認証は トークンヘッダー だけで完結する
// 　　　という理由で、supports_credentials を false にしている
    'supports_credentials' => false,  // クレデンシャル（認証情報）付きのリクエストを許可しない
];


