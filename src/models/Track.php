<?php

class Track{
    public $id;
    public $name;

    public function __construct($name =""){
        if(!empty($name)){
        $this->name=$name;
        }
    }
    public static function getAllTrack(){
        $db=Database::getInstance();
        
        $log= $db->prepare('SELECT `id`,`name` FROM `track`');
        
        $log->execute();
        return $log->fetchALL();
    }
}