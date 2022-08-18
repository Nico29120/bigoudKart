<?php

class GroupController{
    
    public static function newGroup(){
        
        if (!empty($_POST['groupName'])){
            
          $db=Database::getInstance();
        
            $group = $db->prepare('INSERT INTO `groups`(`name`) VALUES (:groupName)');
            
            $params=[
                'groupName' => $_POST['groupName']
            ];
            $group->execute($params);
            
            $lastId = $db->lastInsertId();
            var_dump($lastId);
            
            $member = $db->prepare('INSERT INTO `user/group`(`user_id`, `group_id`) VALUES (:user_id, :group_id)');
            
            $param=[
                'user_id' => $_SESSION['logged_user'],
                'group_id' => $lastId
            ];
            $member->execute($param);
        }
        
        $template = "newGroup";
        require "./templates/layout.php";
    }
    
    public static function invite(){
        
    }
}