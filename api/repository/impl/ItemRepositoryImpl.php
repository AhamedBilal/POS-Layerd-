<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:54 AM
 */

require_once __DIR__ .'/../../dto/Item.php';
require_once __DIR__ .'/../../db/DBConnection.php';
require_once __DIR__ .'/../ItemRepository.php';
class ItemRepositoryImpl implements ItemRepository
{
    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function addItem(Item $item): bool
    {
        return ($this->connection->query("INSERT INTO item VALUES ('{$item->getCode()}','{$item->getItemName()}','{$item->getQtyOnHand()}','{$item->getUnitPrice()}')"));
    }

    public function deleteItem($code): bool
    {
        return ($this->connection->query("DELETE FROM ITEM WHERE code='$code'"));
    }

    public function updateItem($item): bool
    {
        return ($this->connection->query("UPDATE ITEM SET itemName='{$item->getItemName()}',
        qtyOnHand='{$item->getQtyOnHand()}',unitPrice='{$item->getUnitPrice()}' where code='{$item->getCode()}'"));
    }

    public function searchItem($code): array
    {
        $res=$this->connection->query("select * from item where code='$code'");
        return $res->fetch_row();
    }

    public function getAllItem(): array
    {
        $result = $this->connection->query("select * from item");
        return $result->fetch_all();
    }
}