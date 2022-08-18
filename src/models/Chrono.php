<?php

class Chrono{
    public $id;
    public $chrono;
    public $track;

    public function __construct($chrono ="",$track=""){
        
        if(!empty($chrono)){
        $this->chrono=$chrono;
        }
        if(!empty($track)){
        $this->track=$track;
        }
    }
}