<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/11/2019
 * Time: 10:47 AM
 */

require_once __DIR__.'/../../dto/Order.php';
require_once __DIR__.'/../../dto/OrderDetails.php';
require_once __DIR__.'/../PlaceOrderBO.php';
require_once __DIR__.'/../../repository/OrderRepository.php';
require_once __DIR__.'/../../repository/impl/OrderRepositoryImpl.php';
require_once __DIR__.'/../../repository/OrderDetailsRepository.php';
require_once __DIR__.'/../../repository/impl/OrderDetailsRepositoryImpl.php';
require_once __DIR__.'/../../db/DBConnection.php';

class PlaceOrderBOImpl implements PlaceOrderBO
{
    private $orderRepository;
    private $orderDetailsRepository;
    /**
     *  constructor.
     */
    public function __construct()
    {
        $this->orderRepository=new OrderRepositoryImpl();
        $this->orderDetailsRepository=new OrderDetailsRepositoryImpl();
    }


    public function placeOrder(Order $order, $arr): bool
    {
        $connection= (new DBConnection())->getConnection();
        $this->orderRepository->setConnection($connection);
        $this->orderDetailsRepository->setConnection($connection);
        $connection->autocommit(false);
        $res=$this->orderRepository->addOrder($order);
        if ($res){
            for ($i=0;$i<count($arr);$i++){
                $code=$arr[$i]->code;
                $qty=$arr[$i]->qty;
                $price=$arr[$i]->price;
                $res=$this->orderDetailsRepository->addOD(new OrderDetails($order->getOid(),$code,$qty,$price));
                if (!$res){
                    $connection->rollback();
                    $connection->autocommit(true);
                    return false;
                }
            }
            $connection->commit();
            $connection->autocommit(true);
            return true;
        }else{
            $connection->rollback();
            $connection->autocommit(true);
            return false;
        }
    }

    public function getAllOrders(): array
    {
        $connection= (new DBConnection())->getConnection();
        $this->orderRepository->setConnection($connection);
        return $this->orderRepository->getAllOrder();
    }
}