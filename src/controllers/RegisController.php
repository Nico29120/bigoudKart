<?php
namespace App\controllers;
use App\classes\Database;
use App\controllers\Render;
use App\models\User;

class RegisController extends Render{
    
    public static function register (){
        
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['mail'])){
            $username=trim($_POST['username']);//supprime les espaces dans le pseudo de l'utilisateur
            $username=strip_tags($username);//supprime les balises html dans le pseudo
            
            $password=trim($_POST['password']);//supprime les espaces dans le mot de passe de l'utilisateur
            $password=strip_tags($password);//supprime les balises html dans le mot de passe
            
            $mail=trim($_POST['mail']);//supprime les espaces dans le mail de l'utilisateur
            $mail=strip_tags($mail);//supprime les balises html dans le mail
            
            User::newUser($username,$password,$mail);
            
            header('Location: ./login');
        };
        self::template('register');
    }
}