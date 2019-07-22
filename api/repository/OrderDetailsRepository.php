<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:52 AM
 */
require_once __DIR__.'/../dto/OrderDetails.php';

interface OrderDetailsRepository
{
    public function addOD(OrderDetails $od):bool ;
    public function deleteOD($oid):bool ;
    public function updateOD($od):bool ;
    public function searchOD($oid):Customer;
    public function getAllOD():array ;
    public function setConnection(mysqli $connection);

}