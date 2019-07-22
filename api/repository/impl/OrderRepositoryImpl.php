<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:54 AM
 */

require_once __DIR__ .'/../../dto/Order.php';
require_once __DIR__ .'/../../db/DBConnection.php';
require_once __DIR__ .'/../OrderRepository.php';
class OrderRepositoryImpl implements OrderRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function addOrder(Order $order): bool
    {
        return ($this->connection->query("INSERT INTO orders VALUES ('{$order->getOid()}','{$order->getDate()}','{$order->getCustomerID()}')"));
    }

    public function deleteOrder($oid): bool
    {
        // TODO: Implement deleteOrder() method.
    }

    public function updateOrder($order): bool
    {
        // TODO: Implement updateOrder() method.
    }

    public function searchOrder($oid): Customer
    {
        // TODO: Implement searchOrder() method.
    }

    public function getAllOrder(): array
    {
        $result = $this->connection->query("select * from orders");
        return $result->fetch_all();
    }
}