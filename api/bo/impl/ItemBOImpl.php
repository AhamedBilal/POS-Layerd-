<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/11/2019
 * Time: 10:47 AM
 */

require_once __DIR__.'/../../dto/Item.php';
require_once __DIR__.'/../ItemBO.php';
require_once __DIR__.'/../../repository/ItemRepository.php';
require_once __DIR__.'/../../repository/impl/ItemRepositoryImpl.php';
require_once __DIR__.'/../../db/DBConnection.php';

class ItemBOImpl implements ItemBO
{
    private $itemRepository;

    /**
     *  constructor.
     */
    public function __construct()
    {
        $this->itemRepository=new ItemRepositoryImpl();
    }

    public function addItem(Item $item): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->addItem($item);
    }

    public function deleteItem($itemID): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->deleteItem($itemID);
    }

    public function updateItem($item): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->updateItem($item);
    }

    public function searchItem($itemID): array
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->searchItem($itemID);
    }

    public function getAllItem(): array
    {
        $connection= (new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->getAllItem();
    }
}