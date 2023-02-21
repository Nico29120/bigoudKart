<?php
namespace App\models;
use App\classes\Database;


class User{
    public $id;
    public $username;
    public $password;
    private const cost=["cost" => 10];

    public function __construct($username ="",$password=""){
        
        if(!empty($username)){
        $this->username=$username;
        }
        if(!empty($password)){
        $this->password=$password;
        }
    }
    public static function newUser($username,$password,$mail):void{
        $db=Database::getInstance();
        
            $register = $db->prepare(
                'INSERT INTO `user`(`username`, `mail`, `password`)
                VALUES (:username, :mail, :password)
                ');
            
            $params=[
                'username' => $username,
                'mail' => $mail,
                'password' => password_hash($password, PASSWORD_BCRYPT, self::cost)//cryptage du mot passe
            ];
            $register->execute($params);
    }
    public static function getUserGroup($groupId):array{
        $db=Database::getInstance();

        $usersGroupQuery = $db->prepare(
            'SELECT `user`.id as userId, `user`.username
            FROM `user`, `user_group`
            WHERE `user`.id = user_group.user_id AND user_group.group_id = :group_id
            ORDER BY `user`.username'
            );
        $usersGroupQuery->execute(['group_id' => $groupId]);
        return $usersGroupList = $usersGroupQuery->fetchAll();
    }
    public static function userSearch($userSearch):array{
        $db=Database::getInstance();
            
        $search = $db->prepare(
            'SELECT `username`,`id`, `mail` 
            FROM user 
            WHERE username LIKE :userSearch'
            );
        
        $params = [
            'userSearch' => "%".$userSearch."%"
            ];
        $search->execute($params);
        return $search->fetchAll();
    }
}