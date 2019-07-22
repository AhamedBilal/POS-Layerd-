<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:52 AM
 */
require_once __DIR__.'/../dto/Customer.php';

interface CustomerRepository
{
    public function addCustomer(Customer $customer):bool ;
    public function deleteCustomer($customerID):bool ;
    public function updateCustomer($customerID):bool ;
    public function searchCustomer($customerID):Customer;
    public function getAllCustomer():array ;
    public function setConnection(mysqli $connection);

}