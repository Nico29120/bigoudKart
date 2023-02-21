<?php
namespace App\controllers;

abstract class Render{
    
    protected static function template($templates, $args = []){
        extract($args);

        $template = $templates;
        require './templates/layout.php';
    }
}