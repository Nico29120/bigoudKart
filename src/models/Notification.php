<?php
namespace App\models;
use App\classes\Database;


class Notification{
    public $id;
    public $from_user;
    public $to_user;
    public $group_id;
    public $statement;

    public function __construct($from_user ="",$to_user="",$group_id="",$statement=""){
        
        if(!empty($from_user)){
        $this->from_user=$from_user;
        }
        if(!empty($to_user)){
        $this->to_user=$to_user;
        }
        if(!empty($group_id)){
        $this->group_id=$group_id;
        }
        if(!empty($statement)){
        $this->statement=$statement;
        }
    }
    
    public static function invite($fromUserId, $toUserID, $groupId):void{
        $db=Database::getInstance();
        $notifQuery=$db->prepare(
            'INSERT INTO `notification` (`statement`, `from_user_id`, `to_user_id`, `group_id`)
            VALUES (:statement, :from_user_id, :to_user_id, :group_id)'
            );
        
        $params = [
                'statement' => 'en cours',
                'from_user_id' =>$fromUserId,
                'to_user_id' =>$toUserID,
                'group_id' =>$groupId
                ];
        $notif=$notifQuery->execute($params);
    }
    public static function notificationsList($userId) :array{ 
        $db=Database::getInstance();
         
        $notif= $db->prepare(
            'SELECT `user`.username,`group`.groupName, `group`.id
            FROM `notification`
            JOIN `user` ON `notification`.from_user_id=`user`.id
            JOIN `group` ON `notification`.group_id=`group`.id
            WHERE to_user_id = :userid'
            );
        
        $params=[
             'userid' => $userId
             ];
             
        $notif->execute($params);
        
        return $result=$notif->fetchAll();
    }
    public static function notificationsAccept($userId, $groupId) :void{
        $db=Database::getInstance();
        
        $addMember=$db->prepare(
            'INSERT INTO `user_group` (`user_id`, `group_id`) 
            VALUES (:user_id,:group_id)'
            );
        $params=[
            'user_id' => $userId,
            'group_id' => $groupId
            ];
        $addmember->execute($params);
        
        
        $deleteNotif=$db->prepare(
            'DELETE FROM `notification` 
            WHERE to_user_id=:user_id AND group_id=:group_id'
            );
        
        $deleteNotif->execute($params);
    }
    public static function notificationsDecline($userId, $groupId) :void{
         $db=Database::getInstance();
        
        $deleteNotif=$db->prepare(
            'DELETE FROM `notification` 
            WHERE to_user_id=:user_id AND group_id=:group_id'
            );
        
        $params=[
            'user_id' => $userId,
            'group_id' => $groupId
            ];
            
        $deleteNotif->execute($params);    
    }
}