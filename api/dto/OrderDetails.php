<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/22/2019
 * Time: 1:20 PM
 */

class OrderDetails
{
    private $orderID;
    private $itemCode;
    private $qty;
    private $unitPrice;

    /**
     * OrderDetails constructor.
     * @param $orderID
     * @param $itemCode
     * @param $qty
     * @param $unitPrice
     */
    public function __construct($orderID, $itemCode, $qty, $unitPrice)
    {
        $this->orderID = $orderID;
        $this->itemCode = $itemCode;
        $this->qty = $qty;
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @param mixed $orderID
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param mixed $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
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