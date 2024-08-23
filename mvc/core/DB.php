<?php
class DB
{
    public $conn;
    protected $severname = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "quanlytro";

    public function __construct()
    {
        $this->conn = mysqli_connect($this->severname, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf8'");
    }
}
