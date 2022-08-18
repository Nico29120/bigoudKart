<?php
class TimeController{
    
    public static function list(){
        $db=Database::getInstance();
        
        $log= $db->prepare('SELECT `times`,`name` FROM `chrono` JOIN `track` ON chrono.circuit_id=track.id WHERE `user_id`=:userid');
        $params=[
            'userid' => $_SESSION['logged_user'],
            ];
        $log->execute($params);
        $result=$log->fetch();
        
        
        
        $template = 'chrono';
        require "./templates/layout.php";
    }
}
