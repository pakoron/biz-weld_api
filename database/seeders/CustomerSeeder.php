<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 顧客データを生成
        // \App\Models\Customer::factory(10)->create();

        $user = User::first();

        Customer::factory(10)->create([
            'user_id' => $user->id, // 存在する user_id を設定
        ]);
    }
}
