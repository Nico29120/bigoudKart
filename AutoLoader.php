<?php

// spl_autoload_register(function ($class) {
//     include './src/classes' . $class . '.php';
// });

require "./src/classes/Database.php";
require "./src/classes/Router.php";
require "./src/classes/service/Auth.php";
require "./src/controller/AuthController.php";
require "./src/controller/RegisController.php";
require "./src/controller/TimeController.php";
require "./src/models/User.php";