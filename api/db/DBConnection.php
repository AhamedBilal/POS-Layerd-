<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bilal
 * Date: 7/10/2019
 * Time: 9:53 AM
 */

class DBConnection
{
    private $host="localhost";
    private $username="root";
    private $password="mysql2018ultimate";
    private $port="3306";
    private $dbName="company";

    private $connection;

    /**
     * DBConnection constructor.
     */
    public function __construct()
    {
        $this->connection = new mysqli($this->host,$this->username,$this->password,$this->dbName, $this->port);
        if ($this->connection->connect_error){
            echo $this->connection->connect_error;
            die();
        }
    }


    public function getConnection(){
        return $this->connection;
    }
}