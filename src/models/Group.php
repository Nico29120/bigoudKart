<?php
namespace App\models;
use App\classes\Database;
use \PDO;

class Group{
    public $id;
    public $groupName;
    
    public function __construct($id="",$name =""){
        if(!empty($id)){
        $this->id=$id;
        }
        if(!empty($name)){
        $this->groupName=$name;
        }
    }
    
    public static function addGroup ($groupName):void{
         $db=Database::getInstance();
        
            $group = $db->prepare(
                'INSERT INTO `group`(`groupName`)
                VALUES (:groupName)'
                );
            
            $params=[
                'groupName' => $groupName
            ];
            $group->execute($params);
            
            $lastId = $db->lastInsertId();
            
            $member = $db->prepare(
                'INSERT INTO `user_group`(`user_id`, `group_id`)
                VALUES (:user_id, :group_id)'
                );
            
            $param=[
                'user_id' => $_SESSION['logged_user'],
                'group_id' => $lastId
            ];
            $member->execute($param);
        }
    public static function getAllGroupByUser($userid):array{
        $db=Database::getInstance();
        
        $groupSelect = $db->prepare(
            'SELECT `group`.id,`groupName`
            FROM `group`
            JOIN `user_group` ON `group`.id = `user_group`.group_id
            JOIN `user` ON `user_group`.user_id = `user`.id
            WHERE `user`.id=:user_id'
            );
        $params=[
                'user_id' => $userid
            ];
        $groupSelect->execute($params);
        
        return $groupList = $groupSelect->fetchAll(PDO::FETCH_CLASS, get_class());
        
    }
    
    public static function groupFromId($userId,$groupId):array{
        $db=Database::getInstance();
            
            $groupSelect = $db->prepare('SELECT `groupName`,`group`.id
                                        FROM `group`
                                        JOIN `user_group` ON `group`.id = `user_group`.group_id
                                        AND `user_group`.user_id = :user_id
                                        WHERE `group`.id = :group_id');
            $params=[
                    'user_id' => $userId,
                    'group_id' => $groupId
                ];
            $groupSelect->execute($params);
            
    
            return $groupList = $groupSelect->fetch();
    }
}