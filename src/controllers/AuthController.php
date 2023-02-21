<?php
namespace App\controllers;
use App\controllers\Render;
use App\classes\services\Authenticator;
use App\models\User;

class AuthController extends Render{
    
    public static function login (){
        
        if(!empty($_POST['username']) && !empty($_POST['password'])){//récupération des logs rentrés par l'utilisateur pour se connecter
            $username=trim($_POST['username']);
            $username=strip_tags($username);
            
            $password=trim($_POST['password']);
            $password=strip_tags($password);
            
            $user = Authenticator::authenticate(new User($username,$password));//authentification de l'utilisateur via le service
            if(Authenticator::isLogged()){
                header('Location: ./');//redirection vers la page d'acceuil
            }    
        }
        self::template('login');//
    }
    
    public static function logout(){
        //déconnexion de l'utilisateur
        Authenticator::logout();
        header('Location: ./');//redirection vers la page d'acceuil
        
    }
    
    public static function home(){
        self::template('home');
    }
}