<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/11/2019
 * Time: 10:45 AM
 */

require_once __DIR__.'/../dto/Item.php';

interface ItemBO
{
    public function addItem(Item $item):bool ;
    public function deleteItem($itemID):bool ;
    public function updateItem($item):bool ;
    public function searchItem($itemID):array ;
    public function getAllItem():array ;
}