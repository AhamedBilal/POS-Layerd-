<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/11/2019
 * Time: 10:47 AM
 */

require_once __DIR__.'/../../dto/Customer.php';
require_once __DIR__.'/../CustomerBO.php';
require_once __DIR__.'/../../repository/CustomerRepository.php';
require_once __DIR__.'/../../repository/impl/CustomerRepositoryImpl.php';
require_once __DIR__.'/../../db/DBConnection.php';

class CustomerBOImpl implements CustomerBO
{
    private $customerRepository;

    /**
     * CustomerBOImpl constructor.
     */
    public function __construct()
    {
        $this->customerRepository=new CustomerRepositoryImpl();
    }


    public function addCustomer(Customer $customer): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->addCustomer($customer);
    }

    public function deleteCustomer($customerID): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->deleteCustomer($customerID);
    }

    public function updateCustomer($customerID): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->updateCustomer($customerID);
    }

    public function searchCustomer($customerID): Customer
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->searchCustomer($customerID);
    }

    public function getAllCustomer(): array
    {
        $connection= (new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->getAllCustomer();
    }
}