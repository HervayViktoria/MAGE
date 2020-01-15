<?php
require_once 'everyIncHasIt.inc.php';
$verb = new Verb();
//Ragozás játékhoz
    function Conjug(){
        global $verb;
        $verb->Game1();
    

    }
  //Jelentés játékhoz
    function Meaning(){
        global $verb;
        $verb->Game2();
    }