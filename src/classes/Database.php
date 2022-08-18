<?php

abstract class Database{
    
    private static $instance;
    
    public static function getInstance(){
        
        if (!self::$instance):
            try{
                self::$instance = new PDO(
                                    'mysql:host=db.3wa.io;port=3306;dbname=nicolasleberre_bigoudKart',
                                    'nicolasleberre',
                                    '384f32d0b68b34a13094b62d5de643c0'
                                    );
            } catch(Exception $e){
                var_dump($e);
            }
            
        endif;
        
        return self::$instance;
    }
}