<?php
namespace App\classes\services;
use App\classes\Database;
use App\classes\services\Authenticator;

class Notificator{//vérification de l'existence d'une notification l'utilisateur connecté
 
    public static function isNotified(){
        
        if (Authenticator::isLogged()){
        $db=Database::getInstance();
        $notif=$db->prepare('SELECT * FROM `notification` WHERE `to_user_id`=:user_id');
        $params = [
            'user_id' => $_SESSION['logged_user']];
        $notif->execute($params);
        
        return $notif->fetchAll();
        }
    }   
}