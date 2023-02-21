<?php
namespace App\classes;
use \PDO;

abstract class Database{//singleton de la database
    
    private static $instance;
    
    public static function getInstance(){
        
        if (!self::$instance):
            try{
                //récupération des accès à la base de donnée via le fichier .ini
                $db = parse_ini_file("./.ini",$process_sections = true);
                $user = $db['user'];
                $pass = $db['pass'];
                $name = $db['name'];
                $host = $db['host'];
                $type = $db['type'];
                //connection à la db
                self::$instance = new PDO(
                                    "$type:host=$host;port=3306;dbname=$name",
                                    "$user",
                                    "$pass"
                                    );
            } catch(Exception $e){
                var_dump($e);
            }
            
        endif;
        
        return self::$instance;
    }
}