<?php
namespace App\classes;
use App\controllers\AuthController;
use App\controllers\GroupController;
use App\controllers\NotifController;
use App\controllers\RegisController;
use App\controllers\TimeController;

class Router{ //création des routes avec appel au callback correspondant dans une classe donnée
    public $routes=[];
    public $path=[];
    
    public function __construct($route){
        
        $this->path = $route;
     }
    
    public function addRoute($route,$callback){
        $this->routes[] = new Route($route,$callback);
    }
    
    public function comparateRoute(){
        $routed = false;
        foreach($this->routes as $route){
            if (preg_match('/^'.$route->path.'$/', $this->path, $matches)) { //vérifiaction de la regex
            $routed = true;
                call_user_func($route->callback, $matches);
            }
        }
        
        if (!$routed) {
            require './templates/errorPage.php';
            // Erreur, pas routé
        }
    }
}

class Route{
    public $path;
    public $callback;
    
    public function __construct($route,$cb){
        $this->path = $route;
        $this->callback = $cb;
    }
}