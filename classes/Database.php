<?php

# CREATE DATABASE CONNECTION
class Database {
    private $server_name     = "localhost";
    private $username        = "root";
    private $password        = "" ;   // "root" for mac
    private $db_name         = "sales_oop";
    protected $conn;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);
        // $this->conn holds the connection to the database.

        if($this->conn->connect_error){
            die('Unable to connect to database: ' . $this->conn->connect_error);
        }
    }
}
?>