<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:49 AM
 */
?>
<?php
    require_once __DIR__.'/../dto/Item.php';
    require_once __DIR__.'/../bo/impl/ItemBOImpl.php';


    $operation = $_POST['type'];

    $itemBO = new ItemBOImpl();

    switch ($operation){
        case "add" :
            $code = $_POST['code'];
            $itemName = $_POST['itemname'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $tempObj = new Item($code,$itemName,$qty,$price);
            $res = $itemBO->addItem($tempObj);
            if ($res){
                echo "Customer Added";
            }else{
                echo "not added";
            }
            break;
        case "delete" :
            $code = $_POST['code'];
            $res = $itemBO->deleteItem($code);
            if ($res){
                echo "Customer Deleted";
            }else{
                echo "not Deleted";
            }
            break;
        case "update" :
            $code = $_POST['code'];
            $itemName = $_POST['itemname'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $tempObj = new Item($code,$itemName,$qty,$price);
            $res = $itemBO->updateItem($tempObj);
            if ($res){
                echo "Customer Updated";
            }else{
                echo "not Updated";
            }
            break;
        case "getall" :
            $res = json_encode($itemBO->getAllItem());
            echo $res;
            break;
        case "search" :
            $code = $_POST['code'];
            $res = json_encode($itemBO->searchItem($code));
            echo $res;
            break;
    }