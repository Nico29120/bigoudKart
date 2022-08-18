<?php

class AuthController{
    
    public static function login (){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = Authenticator::authenticate(new User($_POST['username'],$_POST['password']));
        
        }
        $template = "login";
        require "./templates/layout.php";
    }
    
    public static function logout(){
        
        Authenticator::logout();
        header('Location: ./login');
        
    }
}