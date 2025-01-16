<?php

namespace App\Service;

use App\Repository\CustomerRepository;
use App\Models\Customer;
use Exception;
class CustomerService
{
    public function __construct(
        private CustomerRepository $customerRepo
    ) {}

    /**
     * 顧客一覧取得
     * @return Collection
     */
    public function getCustomerList()
    {
        try {
            return $this->customerRepo->getCustomerList();
        } catch (Exception $e) {
            \Log::error('getCustomerListでエラーが発生しました'.$e->getMessage());
            throw $e;
        }
    }

    /**
     * 顧客登録
     * @param array $data
     * @return Customer
     */
    public function createCustomer(array $data)
    {
        try {
            $customer = $this->customerRepo->createCustomer($data);
            if(!$customer) {
                throw new Exception('顧客の作成に失敗しました');
            }
            return $customer;
        } catch (Exception $e) {
            \Log::error('createCustomerでエラーが発生しました'.$e->getMessage());
            throw $e;
        }
    }

    /**
     * 顧客更新
     * @param Customer $customer
     * @param array $data
     * @return Customer
     */
    public function updateCustomer(Customer $customer, array $data)
    {
        try {
            $customer = $this->customerRepo->updateCustomer($customer, $data);
            if(!$customer) {
                throw new Exception('顧客の更新に失敗しました');
            }

            return $customer;
        } catch (Exception $e) {
            \Log::error('updateCustomerでエラーが発生しました'.$e->getMessage());
            throw $e;
        }
    }

    /**
     * 顧客削除
     * @param Customer $customer
     * @return bool
     */
    public function deleteCustomer(Customer $customer)
    {
        try {
            $result = $this->customerRepo->deleteCustomer($customer);
            if(!$result) {
                throw new Exception('顧客の削除に失敗しました');
            }
            return $result;
        } catch (Exception $e) {
            \Log::error('deleteCustomerでエラーが発生しました'.$e->getMessage());
            throw $e;
        }
    }
}
