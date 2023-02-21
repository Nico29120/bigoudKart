<?php
namespace App\controllers;
use App\classes\services\Authenticator;
use App\controllers\Render;
use App\models\Group;
use App\models\Track;
use App\models\User;
use App\models\Timer;
use App\models\Notification;

class GroupController extends Render{ //création, listing et invitation au(x) groupe(s)
    
    public static function newGroup(){
        //création d'un groupe
        if (!empty($_POST['groupName'])){
            
            $groupName=trim($_POST['groupName']);//supprime les espaces dans la requête de l'utilisateur
            $groupName=strip_tags($groupName);//supprime les balises html dans la requête
            
            Group::addGroup($groupName);
            header("Location: /bigoudkart/mygroup");//redirection vers la page des groupes
        };
        self::template('newGroup');
        
    }
    
    public static function groupList(){//listing des groupes de l'utilisateur connecté
        if (Authenticator::isLogged()){
            $groupList=Group::getAllGroupByUser($_SESSION['logged_user']);
        
            self::template('groupList',['groupList' => $groupList]);
        }else{
            header("Location: /bigoudkart/login");//redirection vers le formulaire de connexion si l'utilisateur n'est pas connecté
        }
    }
    
    public static function groupById($args){
        if (Authenticator::isLogged()){
            
            $groupList = Group::groupFromId($_SESSION['logged_user'],$args['id']);
            
            // Tous les circuits
            $trackList = Track::getAllTrack();
            
            // Tous les joueurs du groupe
            $usersGroupList = User::getUserGroup($args['id']);
            
            // Les temps des joueurs du groupe
            $groupTimeList = Timer::getTimeByUserBygroup($args['id']);
            
            // Préparation du tableau des temps
            $array_groupTime = [];
            
            foreach ($trackList as $trackItem) {
                $array_groupTime[$trackItem['id']] = [
                    'id' => $trackItem['id'],
                    'name' => $trackItem['name'],
                    'players' => []
                ];
                
                foreach ($usersGroupList as $usersGroupItem) {
                    $array_groupTime[$trackItem['id']]['players'][$usersGroupItem['userId']] = [
                        'id' => $usersGroupItem['userId'],
                        'username' => $usersGroupItem['username'],
                        'time' => ''
                    ];
                }
            }
            
            // Traitement des données des temps du groupe
            foreach ($groupTimeList as $groupTimeItem) {
                $array_groupTime[$groupTimeItem['trackId']]['players'][$groupTimeItem['userId']]['time'] = $groupTimeItem['time'];
            }
            //Recherche d'utilisateur pour inviter dans le groupe
            $result=[];
             if(isset($_POST['search'])){
                $userSearch=trim($_POST['search']);
                $userSearch=strip_tags($userSearch);
                $result=User::userSearch($userSearch);
             }
             
             self::template('groupById',['result' => $result,'groupTime' =>$array_groupTime,'groupList' => $groupList, 'usersGroupList' => $usersGroupList,'array_groupTime' => $array_groupTime]);
             
        }else{
            header("Location: /bigoudkart/login");
        }
    }
    
    public static function invite($args){
        if (Authenticator::isLogged()){
            $groupId=$args['id'];
            $fromUserId=$_SESSION['logged_user'];
            $toUserId=$args['toid'];
            
            //création d'une notification pour l'utilisateur invité dans le groupe
            Notification::invite($fromUserId,$toUserId,$groupId);
            
            header("Location: /bigoudkart/mygroup/$groupId");//redirection sur la page du groupe
        }
    }
}