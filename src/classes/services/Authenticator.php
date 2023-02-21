<?php
namespace App\classes\services;
use App\classes\Database;
use \PDO;
use App\models\User;

class Authenticator{ //login, logout, verification si un utilisateur est connecté, création d'un message d'erreur pour le login
    
    public static function authenticate (User $user){ //verification des log de l'utilisateur pour la connection
        $db=Database::getInstance();
        //comparatif du nom d'utilisateur
        $log= $db->prepare('SELECT `id`,`username`,`password` FROM user WHERE username=:username');
        $params=[
            'username' => $user->username,
            ];
        $log->execute($params);
        $log->setFetchMode(PDO::FETCH_CLASS, get_class($user));
        
        $result= $log->fetch();
        
        if($result){//comparatif des hash pour le mot de passe si le nom d'utilisateur est correct
        $passwordHashed = $result->password;
        $verif = password_verify($user->password, $passwordHashed);
        };
        
        if($result === false || $verif === false){//message d'erreur d'authentification si le mot de passe ou le nom d'utilisateur ne correspond pas
            $_SESSION['login_failed'] = "Mauvais Nom d'utilisateur ou Mot de passe";
            return false;
            
        }else{
            $_SESSION['logged_as'] = $result->username;
            $_SESSION['logged_user'] = $result->id;
            $_SESSION['login_failed'] = null;
        }
    
    }
    public static function logout() : void{//déconnection de l'utilisateur
        unset($_SESSION['logged_as']);
        unset($_SEISSON['logged_user']);
    }
    
    public static function isLogged() : bool{//vérifie quel utilisateur est connécté
        return !empty($_SESSION['logged_as']);
    }
    
    public static function error() : bool{//gestion d'ereur en cas de log érronés
        return !empty($_SESSION['login_failed']);
    }
}