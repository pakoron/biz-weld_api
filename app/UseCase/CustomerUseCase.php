<?php

namespace App\UseCase;

use App\Service\CustomerService;
use App\Models\Customer;
use Illuminate\Support\Collection;

class CustomerUseCase
{
    public function __construct(
        private CustomerService $customerService
    ) {}

    /**
     * 顧客一覧取得
     * @return Collection
     */
    public function getCustomerList()
    {
        return $this->customerService->getCustomerList();
    }

    /**
     * 顧客登録
     * @param array $data
     * @return Customer
     */
    public function createCustomer(array $data)
    {
        return $this->customerService->createCustomer($data);
    }

    /**
     * 顧客更新
     * @param Customer $customer
     * @param array $data
     * @return Customer
     */
    public function updateCustomer(Customer $customer, array $data)
    {
        return $this->customerService->updateCustomer($customer, $data);
    }

    /**
     * 顧客削除
     * @param Customer $customer
     * @return bool
     */
    public function deleteCustomer(Customer $customer)
    {
        return $this->customerService->deleteCustomer($customer);
    }
}
