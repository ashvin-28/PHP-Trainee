<?php
class database{
    public $conn;
    function __construct()
    {
      $this->conn=new mysqli("localhost","root","admin123","EmployeeDB");
      if($this->conn){
        // echo "connected";
      }
      else{
        echo "no";
      }
    }
}
