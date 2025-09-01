<?php
namespace App\controllers;
use App\controllers\Render;
use App\models\Notification;

class NotifController extends Render{
    
    public static function notifList(){
        //listing des notifications de l'utilisateur connecté
        $notif=Notification::notificationsList($_SESSION['logged_user']);
        
        self::template('notif',['notif' => $notif]); 
    }
    
    public static function notifAccept($args){
        $userId = $_SESSION['logged_user'];
        $groupId = $args['id'];
        
        //invitation acceptée, ajout de l'utilisateur au groupe, supression de la notification
        Notification::notificationsAccept($userId,$groupId);
        
        header("Location: /mygroup");
        
    }
    
    public static function notifDecline($args){
        $userId = $_SESSION['logged_user'];
        $groupId = $args['id'];
        //invitation refusée, supression de la notification
        Notification::notificationsDecline($userId,$groupId);
        
        header("Location: /mygroup");
    }

}