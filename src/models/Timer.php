<?php
namespace App\models;
use App\classes\Database;


class Timer{
    public $id;
    public $time;
    public $track;

    public function __construct($time ="",$track=""){
        
        if(!empty($time)){
        $this->chrono=$time;
        }
        if(!empty($track)){
        $this->track=$track;
        }
    }
     public static function timeList():array{//listing des temps d'un utilisateur par circuit
        $db=Database::getInstance();
        
        $log= $db->prepare(
            'SELECT `time`,`name`
            FROM `time`
            JOIN `track` ON time.track_id=track.id
            WHERE `user_id`=:userid
            ORDER BY track.name'
            );
        $params=[
            'userid' => $_SESSION['logged_user'],
            ];
        $log->execute($params);
        return $result=$log->fetchALL();
     }
     public static function addTime($track,$time):void{
         
        $db=Database::getInstance();
            
        $lastInputTime=$db->prepare(
            'SELECT `id`,`time`,`user_id`,`track_id`
            FROM `time`
            WHERE `user_id`=:user_id AND `track_id`=:track_id'
            );
        
        $params=[
                'user_id' => $_SESSION['logged_user'],
                'track_id' => $track
                
            ];
        $lastInputTime->execute($params);
        $timeCompare=$lastInputTime->fetch();
        
        if(!$timeCompare){
            $newTime = $db->prepare(
                'INSERT INTO `time`(`time`,`user_id`,`track_id`)
                VALUES (:time,:user_id,:track_id)'
                );
            
            $params=[
                'time' => $time,
                'user_id' => $_SESSION['logged_user'],
                'track_id' => $track
            ];
            
            $newTime->execute($params);
            
        } elseif(intval(str_replace(":","",$time)) < intval(str_replace(":","",$timeCompare['time']))){
            
            $updateTime=$db->prepare(
                'UPDATE `time`
                SET `time`=:time
                WHERE id=:time_id'
                );
            
            $param=[
                'time'=>$time,
                'time_id'=>$timeCompare['id']
                ];
            $updateTime->execute($param);
        };
    }
    
    public static function getTimeByUserBygroup($groupId):array{
        $db=Database::getInstance();

        $groupTime = $db->prepare('SELECT `track`.id as trackId, `track`.name, `time`.time, `user`.id as userId, `user`.username,`group`.groupName
            FROM `track`, `time`, `user`, `user_group`, `group`
            WHERE `track`.id = `time`.track_id
            AND `time`.user_id = `user`.id
            AND `user`.id = `user_group`.user_id
            AND `user_group`.group_id = `group`.id
            AND `group`.id = :group_id');
            $param=[
                    'group_id' =>$groupId
                ];
            $groupTime->execute($param);
            return $groupTimeList = $groupTime->fetchAll();
    }
}