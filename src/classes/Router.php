<?php

class Router{
    public $routes=[];
    public $path=[];
    
    public function __construct($route){
        $this->path = explode('/',$route);
     }
    
    public function addRoute($route,$callback){
        array_push($this->routes,new Route($route,$callback));
    }
    
    public function comparateRoute(){
        foreach($this->routes as $route){
            if($route->path[0] === $this->path[0]){
               call_user_func($route->callback);
            }
        }
    }
}

class Route{
    public $path;
    public $callback;
    
    public function __construct($route,$cb){
        $this->path = explode('/', $route);
        $this->callback = $cb;
    }
}