<?php 
require_once 'everyIncHasIt.inc.php';
//require_once '../templates/headOfEveryPage.php';
$correctVerb = new Verb();
$error = " ";
$coloring = array_fill(0, 6,"color: white");
$correction = array_fill(0, 6, " ");
$answer = array_fill(0, 6, " ");

////azért íratom ki, mert látszik, hogy a szerencsétlen látja a session[type]-ot, de csak egy plusz befrissítés után 
// echo '<pre>';
// print_r($_SESSION);


if (isset($_POST['correction'])) {
    
    $chosenVerb = $_POST['chosenVerb'];
    
    
    if ($_SESSION['type'] == "main") {
        $sql = "SELECT `ich`, `du`, `ese`, `wir`, `ihr`, `sie` FROM `allverbs` WHERE `infinitive` = '".$chosenVerb."';";
        Correction($sql, $chosenVerb);
    }else{
        $sql = "SELECT `user_ich`, `user_du`, `user_ese`, `user_wir`, `user_ihr`, `user_sie` FROM `user_input` WHERE `user_infinitive` = '".$chosenVerb."';";
        Correction($sql, $chosenVerb);
    }
    
  

}

function Correction($sql, $chosenVerb){
    global $db;
    global $correctVerb;
    global $error;
    global $coloring;
    global $correction;
    global $answer;
    if (empty($chosenVerb)) {
        $error = "Mindenképpen válasszon ki egy igét";
    }else{
    
    $table = $db->Query($sql);
    $correctVerb->setConjug($table[0][0], $table[0][1], $table[0][2], $table[0][3], $table[0][4], $table[0][5]);
   
    $answerVerb = new Verb();
   
    $ich = $_POST['Ich'];
    $du = $_POST['Du'];
    $ese = $_POST['Ese'];
    $wir = $_POST['Wir'];
    $ihr = $_POST['Ihr'];
    $sie = $_POST['Sie'];
    
    $answerVerb->setConjug($ich, $du, $ese, $wir, $ihr, $sie);
    for ($i = 0; $i < count($answer); $i++) {
        $answer[$i] = $answerVerb->getConjug()[$i];
    }
    
  
    $correctionArrayFromVerbClass = $answerVerb->Correction($correctVerb->getConjug(), $answerVerb->getConjug());
  
    for ($i = 0; $i < count($correctionArrayFromVerbClass); $i++) {
        if ($correctionArrayFromVerbClass[$i] == "0") {
            $coloring[$i] = "color: #64FF76;";
        }else{
            $coloring[$i] = "color: #FF7C64;";
           $correction[$i] = $correctionArrayFromVerbClass[$i];
        }
    }

    
}

    
}
  
?>
