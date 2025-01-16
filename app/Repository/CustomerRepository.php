<?php

namespace App\Repository;

use App\Models\Customer;

class CustomerRepository
{
    public function __construct(
        private Customer $customerModel
    ) {}

    /**
     * 顧客一覧取得
     * @return Collection
     */
    public function getCustomerList()
    {
        return $this->customerModel->all();
    }

    /**
     * 顧客登録
     * @param array $data
     * @return Customer
     */
    public function createCustomer(array $data)
    {
        return $this->customerModel->create($data);
    }

    /**
     * 顧客取得
     * @param Customer $customer
     * @return Customer
     */
    public function getCustomer(Customer $customer)
    {
        return $this->customerModel->find($customer->id);
    }

    /**
     * 顧客更新
     * @param Customer $customer
     * @param array $data
     * @return Customer
     */
    public function updateCustomer(Customer $customer, array $data)
    {
        return $customer->update($data);
    }

    /**
     * 顧客削除
     * @param Customer $customer
     * @return bool
     */
    public function deleteCustomer(Customer $customer)
    {
        return $customer->delete();
    }
}
