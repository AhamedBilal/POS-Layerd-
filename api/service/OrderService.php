<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/22/2019
 * Time: 2:11 PM
 */
?>
<?php
require_once __DIR__.'/../dto/Order.php';
require_once __DIR__.'/../dto/OrderDetails.php';
require_once __DIR__.'/../bo/impl/PlaceOrderBOImpl.php';


    $operation = $_POST['type'];

    switch ($operation){
        case "add":
            $oid = $_POST['oid'];
            $date = date("Y-m-d");
            $cid=$_POST['cid'];
            $tbldata=json_decode($_POST['x']);

            $orderBO = new PlaceOrderBOImpl();

            $tempObj= new Order($oid,$date,$cid);

            $res=$orderBO->placeOrder($tempObj,$tbldata);

            if ($res){
                echo "Success";
            }else{
                echo "failed";
            }
            break;
        case "getall":
            $orderBO = new PlaceOrderBOImpl();
            $res = json_encode($orderBO->getAllOrders());
            echo $res;
            break;
    }


