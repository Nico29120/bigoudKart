<?php

class RegisController{
    
    private const cost=["cost" => 10];
    
    public static function register (){
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['mail'])){
            $db=Database::getInstance();
        
            $register = $db->prepare('INSERT INTO `users`(`username`, `mail`, `password`) VALUES (:username, :mail, :password)');
            
            $params=[
                'username' => $_POST['username'],
                'mail' => $_POST['mail'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT, $this->option)
            ];
            $register->execute($params);
            
            header('Location: ./login');
        }
        $template = "register";
        require "./templates/layout.php";
    }
}