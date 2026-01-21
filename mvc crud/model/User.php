<?php
require_once "config/database.php";

class User extends database{
    
    public function insert($data){
    return $this->conn->query("INSERT INTO employee_2(firstName, lastName, email, password, confirmPassword, address, phonenumber, gender, hobbies, country, image) 
    VALUES ('{$data['firstName']}', '{$data['lastName']}', '{$data['email']}', '{$data['hasPassword']}', '{$data['hasConfirmPassword']}', '{$data['address']}', '{$data['phoneNumber']}', '{$data['gender']}', '{$data['hob']}', '{$data['country']}', '{$data['targetdir']}')");
}
    public function getAll(){
        return $this->conn->query("select * from employee_2");
    }
    public function delete($id){
        return $this->conn->query("delete from employee_2 where emp_id=$id");
    }
}