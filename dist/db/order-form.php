<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/15/2019
 * Time: 7:29 AM
 */
include "DBConnection.php";

$oid;
$code;
$qty;
$type = $_POST['type'];
$sql;

switch ($type) {
    case "getcustomers":
        $sql = "SELECT * FROM CUSTOMER";
        break;
    case "getitems":
        $sql = "select * from ITEM";
        break;
    case "searchitem":
        $code = $_POST['code'];
        $sql = "SELECT * FROM ITEM WHERE code='$code'";
        break;
    case "updateitem":
        $code = $_POST['code'];
        $qty = $_POST['qty'];

        $sql = "UPDATE ITEM SET qtyOnHand='$qty' where code='$code'";
        break;
//    case "placeorder":
//        $oid = $_POST['oid'];
//        $date = date("Y-m-d");
//        $cid=$_POST['cid'];
//        echo "hello";
//        break;
    default:
        null;
}
$result=false;
if ($type!="placeorder") {
    $result = $connection->query($sql);
}
if ($result) {
    switch ($type) {
        case "getcustomers":
            while ($row = $result->fetch_row()) {
                echo "<option>$row[0]</option>";
            };
            break;
        case "getitems":
            while ($row = $result->fetch_row()) {
                echo "<option>$row[0]</option>";
            };
            break;
        case "searchitem":
            $row=$result->fetch_row();
            echo json_encode($row);
            break;
    }
} else {
    echo "failed : " . $connection->error;
}