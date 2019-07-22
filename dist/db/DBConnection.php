<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/14/2019
 * Time: 8:53 PM
 */

$host="localhost";
    $dbname="company";
    $username="root";
    $password="mysql2018ultimate";
    $port="3306";


$connection=new mysqli($host,$username,$password,$dbname,$port);
if ($connection->connect_errno){
    echo "Connection failed : ".$connection->connect_error;
    exit();
}