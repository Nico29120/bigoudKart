<?php
session_start();

require './AutoLoader.php';

$router = new Router($_GET['p']);

$router->addRoute('register',['RegisController','register']);
$router->addRoute('login',['AuthController','login']);
$router->addRoute('logout',['AuthController','logout']);
$router->addRoute('150cc',['TimeController','list']);
$router->addRoute('addChrono',['TimeController','addChrono']);
$router->addRoute('newgroup',['GroupController','newGroup']);

$router->comparateRoute();