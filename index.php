<?php
session_start();

require './vendor/autoload.php';

use App\classes\Router;
use App\controllers\AuthController;
use App\controllers\GroupController;
use App\controllers\NotifController;
use App\controllers\RegisController;
use App\controllers\TimeController;

// récupération si elle existe de la variable superglobale GET pour la création et la comparaison des routes
if (isset($_GET['url'])){
    $router = new Router($_GET['url']);
};
// création des différentes routes
$router->addRoute('register',[RegisController::class,'register']);

$router->addRoute('login',[AuthController::class,'login']);
$router->addRoute('logout',[AuthController::class,'logout']);

$router->addRoute('150cc',[TimeController::class,'timeList']);
$router->addRoute('addChrono',[TimeController::class,'addTime']);

$router->addRoute('newgroup',[GroupController::class,'newGroup']);
$router->addRoute('mygroup',[GroupController::class,'groupList']);
$router->addRoute('mygroup\/(?<id>[0-9]+)',[GroupController::class,'groupById']);
$router->addRoute('mygroup\/(?<id>[0-9]+)\/invite\/(?<toid>[0-9]+)',[GroupController::class,'invite']);

$router->addRoute('notification',[NotifController::class,'notifList']);
$router->addRoute('notificationAccept\/(?<id>[0-9]+)',[NotifController::class,'notifAccept']);
$router->addRoute('notificationDecline\/(?<id>[0-9]+)',[NotifController::class,'notifDecline']);

// Route vide par défaut
$router->addRoute('',[AuthController::class,'home']);

$router->comparateRoute();
