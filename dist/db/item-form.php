<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/14/2019
 * Time: 9:05 PM
 */

include "DBConnection.php";
$code;
$itemname;
$qty;
$price;
$type = $_POST['type'];
$sql;
switch ($type) {
    case "add":
        $code = $_POST['code'];
        $itemname = $_POST['itemname'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $sql = "INSERT INTO ITEM VALUES ('$code','$itemname','$qty','$price')";
        break;
    case "getall":
        $sql = "select * from ITEM";
        break;
    case "update":
        $code = $_POST['code'];
        $itemname = $_POST['itemname'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $sql = "UPDATE ITEM SET itemName='$itemname',qtyOnHand='$qty',unitPrice='$price' WHERE code='$code'";
        break;
    case "delete":
        $code = $_POST['code'];
        $sql = "DELETE FROM ITEM WHERE code='$code'";
        break;
    default:
        null;
}
$result = $connection->query($sql);
if ($result) {
    switch ($type) {
        case "add":
            echo "customer Added";
            break;
        case "getall":
            while ($row = $result->fetch_row()) {
                echo "<tr>";
                for ($i = 0; $i < count($row); $i++) {
                    echo "<td>$row[$i]</td>";
                }
                echo "</tr>";
            };
            break;
        case "update":
            echo "updated";
            break;
        case "delete":
            echo "deleted";
            break;
    }
} else {
    echo "failed : " . $connection->error;
}