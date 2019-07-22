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
class OrderDetailsRepositoryImpl implements OrderDetailsRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }
    public function addOD(OrderDetails $od): bool
    {
        return ($this->connection->query("INSERT INTO orderdetails VALUES ('{$od->getOrderID()}','{$od->getItemCode()}','{$od->getQty()}','{$od->getUnitPrice()}')"));

    }

    public function deleteOD($oid): bool
    {
        // TODO: Implement deleteOD() method.
    }

    public function updateOD($od): bool
    {
        // TODO: Implement updateOD() method.
    }

    public function searchOD($oid): Customer
    {
        // TODO: Implement searchOD() method.
    }

    public function getAllOD(): array
    {
        // TODO: Implement getAllOD() method.
    }
}