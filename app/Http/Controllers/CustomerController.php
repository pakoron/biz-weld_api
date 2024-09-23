<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        // return response()->json($customers);
        return response()->json(CustomerResource::collection($customers));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        \Log::info($request->all()); // リクエストの内容をログに記録
        $userId = \Auth::id(); // 現在ログインしているユーザーのIDを取得
        $request->user_id=$userId;
        // validated() の結果に user_id を追加してマージする
        $validatedData = array_merge($request->validated(), ['user_id' => $userId]);

        $customer = Customer::create($validatedData);

        if ($customer) {
            return response()->json([
                'message' => '顧客の作成に成功しました',
                // 'data' => $customer
                'data' => CustomerResource::make($customer)
            ], 200); // 201は作成成功のステータスコード
        } else {
            return response()->json([
                'message' => 'エラーが発生しました'
            ], 500); // 500はサーバーエラーのステータスコード
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateCustomerRequest $request,Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
    }
}
