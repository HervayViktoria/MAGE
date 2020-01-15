<?php

function Head($input){
    define('TITLE', $input);
   
 require_once '../templates/head.php';
 require_once '../templates/menu.php';   
}