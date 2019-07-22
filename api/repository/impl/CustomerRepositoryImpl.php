<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:54 AM
 */

require_once __DIR__ .'/../../dto/Customer.php';
require_once __DIR__ .'/../../db/DBConnection.php';
require_once __DIR__ .'/../CustomerRepository.php';
class CustomerRepositoryImpl implements CustomerRepository
{
    private $connection;

    public function addCustomer(Customer $customer): bool
    {
       return ($this->connection->query(
           "insert into customer values(
            '{$customer->getCid()}',
            '{$customer->getName()}',
            '{$customer->getAddress()}',
            '{$customer->getSalary()}'
            )"
       ));

    }

    public function deleteCustomer($customerID): bool
    {
        return ($this->connection->query("DELETE FROM customer WHERE id='$customerID'"));
    }

    public function updateCustomer($customer): bool
    {
        return ($this->connection->query("UPDATE customer SET name='{$customer->getName()}',address='{$customer->getAddress()}',salary='{$customer->getSalary()}' where id='{$customer->getCid()}'"));
    }

    public function searchCustomer($customerID): Customer
    {
        $res=$this->connection->query("SELECT * FROM customer WHERE id='$customerID'");
        return $res->fetch_row();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function getAllCustomer(): array
    {
        $result = $this->connection->query("select * from customer");
        return $result->fetch_all();
    }
}