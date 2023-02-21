<?php
namespace App\controllers;
use App\classes\services\Authenticator;
use App\controllers\Render;
use App\models\Timer;
use App\models\Track;


class TimeController extends Render{
    
    public static function timeList(){

        if (Authenticator::isLogged()){
            $result = Timer::timeList();//récupération des temps de l'utilisateurs
            $track = Track::getAllTrack();//récupération de tout les circuits
    
            self::template('time',['track'=>$track,'result' => $result]);//rendu de la page des temps avec les données nécessaires à l'affichage
        }else{
            header('Location: ./login');
        }
    }
    
    public static function addTime(){
        if (Authenticator::isLogged()){      
            if(!empty($_POST['time']) && !empty($_POST['track'])){
                 
                $time=trim($_POST['time']);//supprime les espaces dans la requête de l'utilisateur
                $time=strip_tags($time);//supprime les balises html dans la requête
                
                $track=$_POST['track'];
                
                Timer::addTime($track,$time);//ajout du temps de l'utilisateur en fonction du circuit
                
            };
             
             header('Location: ./150cc');//redirection vers la page des temps
        }
    }
}
