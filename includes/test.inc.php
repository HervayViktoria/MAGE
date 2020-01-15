<?php

require_once 'everyIncHasIt.inc.php';
//ajaxal megkapja, hogy 5 vagy 10 igével megy-e majd a teszt
$number = $_POST['number'];
 $table = array();
     $length = $db->DbLength();
     //ez szabja majd meg, hogy hány darab igére és alakjaira lesz szükség
     $randomNums = Tools::RandomNumbers($length, $number); 
    for ($i = 0; $i < count($randomNums); $i++) {
        $sql = "SELECT `infinitive`, `hun`, `ich`, `du`, `ese`, `wir`, `ihr`, `sie`, `prateritum`, `auxiliary`, `perfekt` FROM `allverbs` WHERE `verb_id` ='".$randomNums[$i]."';";
        array_push($table, $db->Query($sql)[0]);
      
    }
    //indexelt tömbbe kerültek bele az alakok, amiket majd ajaxal kap meg az oldal(test.js)
echo json_encode($table);

