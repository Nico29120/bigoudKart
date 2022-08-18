<?php

require './AutoLoader.php';

session_start();

$router = new Router($_GET['p']);

$router->addRoute('150cc',['TimeController','list']);
$router->addRoute('register',['RegisController','register']);
$router->addRoute('login',['AuthController','login']);
$router->addRoute('logout',['AuthController','logout']);

$router->comparateRoute();