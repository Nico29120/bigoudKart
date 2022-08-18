<?php
class TimeController{
    
    public static function list(){
        $db=Database::getInstance();
        
        $log= $db->prepare('SELECT `times`,`name` FROM `chrono` JOIN `track` ON chrono.circuit_id=track.id WHERE `user_id`=:userid');
        $params=[
            'userid' => $_SESSION['logged_user'],
            ];
        $log->execute($params);
        $result=$log->fetchALL();
        
        $track=Track::getAllTrack();

        $template = 'chrono';
        require "./templates/layout.php";
    }
    
    public static function addChrono(){
         if(!empty($_POST['chrono']) && !empty($_POST['track'])){
             
            $db=Database::getInstance();
            
            $chrono = $db->prepare('INSERT INTO `chrono`(`times`,`user_id`,`circuit_id`) VALUES (:times,:user_id,:circuit_id)');
            
            $params=[
                'times' => $_POST['chrono'],
                'user_id' => $_SESSION['logged_user'],
                'circuit_id' => $_POST['track']
                
            ];
            $chrono->execute($params);
         }
         
         header('Location: ./150cc');
    }    
}
