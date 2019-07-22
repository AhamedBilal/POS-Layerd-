<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/21/2019
 * Time: 8:12 PM
 */

class Item
{
    private $code;
    private $itemName;
    private $qtyOnHand;
    private $unitPrice;

    /**
     * Item constructor.
     * @param $code
     * @param $itemName
     * @param $qtyOnHand
     * @param $unitPrice
     */
    public function __construct($code, $itemName, $qtyOnHand, $unitPrice)
    {
        $this->code = $code;
        $this->itemName = $itemName;
        $this->qtyOnHand = $qtyOnHand;
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @param mixed $itemName
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * @return mixed
     */
    public function getQtyOnHand()
    {
        return $this->qtyOnHand;
    }

    /**
     * @param mixed $qtyOnHand
     */
    public function setQtyOnHand($qtyOnHand)
    {
        $this->qtyOnHand = $qtyOnHand;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param mixed $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

}