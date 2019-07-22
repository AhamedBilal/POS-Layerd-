<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/21/2019
 * Time: 3:23 PM
 */
include "DBConnection.php";

        $oid = $_POST['oid'];
        $date = date("Y-m-d");
        $cid=$_POST['cid'];
        $tbldata=json_decode($_POST['x']);
        $sql="INSERT INTO orders VALUES ('$oid','$date','$cid')";

        $connection->autocommit(false);
        $resO=$connection->query($sql);
        if ($resO){
            for ($i=0;$i<count($tbldata);$i++){
                $code=$tbldata[$i]->code;
                $qty=$tbldata[$i]->qty;
                $price=$tbldata[$i]->price;
                $sql2="INSERT INTO orderdetails VALUES ('$oid','$code','$qty','$price')";
                $resod=$connection->query($sql2);
                if (!$resod){
                    $connection->rollback();
                    echo "failed ".$connection->error;
                    return;
                }
            }
            $connection->commit();
            echo "Sucsess";
        }else{
            $connection->rollback();
            echo "failed ".$connection->error;
        }
        $connection->autocommit(true);
        $connection->close();


