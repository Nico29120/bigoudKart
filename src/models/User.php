<?php

class User{
    public $id;
    public $username;
    public $password;

    public function __construct($username ="",$password=""){
        
        if(!empty($username)){
        $this->username=$username;
        }
        if(!empty($password)){
        $this->password=$password;
        }
    }
}