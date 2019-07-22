<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/14/2019
 * Time: 9:05 PM
 */

include "DBConnection.php";
$cid;
$name;
$address;
$salary;
$type = $_POST['type'];
$sql;
switch ($type) {
    case "add":
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        $sql = "INSERT INTO CUSTOMER VALUES ('$cid','$name','$address','$salary')";
        break;
    case "getall":
        $sql = "select * from customer";
        break;
    case "update":
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        $sql = "UPDATE CUSTOMER SET name='$name',address='$address',salary='$salary' WHERE id='$cid'";
        break;
    case "delete":
        $cid = $_POST['cid'];
        $sql = "DELETE FROM CUSTOMER WHERE id='$cid'";
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