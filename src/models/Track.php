<?php
namespace App\models;
use App\classes\Database;

class Track{
    public $id;
    public $name;

    public function __construct($name =""){
        if(!empty($name)){
        $this->name=$name;
        }
    }
    public static function getAllTrack():array{
        $db=Database::getInstance();
        
        $log= $db->prepare(
            'SELECT `id`,`name`
            FROM `track`
            ORDER BY `name`'
            );
        
        $log->execute();
        return $trackList=$log->fetchALL();
    }
}