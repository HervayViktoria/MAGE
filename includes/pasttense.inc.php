<?php
require_once 'everyIncHasIt.inc.php';

$correctVerb = new Verb();
$answer = array_fill(0, 3, " ");
$coloring = array_fill(0, 3, "color: white");
$correction = array_fill(0, 3, " ");
$error = " ";
if (isset($_POST['correction'])) {
    
    $chosenVerb = $_POST['chosenVerb'];
    $sql = "SELECT `prateritum`, `auxiliary`, `perfekt` FROM `allverbs` WHERE `infinitive` = '".$chosenVerb."';";
    $table = $db->Query($sql);
    $correctVerb->setPast($table[0][0], $table[0][1], $table[0][2]);
 
    $prat = $_POST['prat'];
    $aux = $_POST['aux'];
    $perf = $_POST['perfekt'];
    
    $answerVerb = new Verb();
    
    $answerVerb->setPast($prat, $aux, $perf);
    
    for ($i = 0; $i < count($answer); $i++) {
        $answer[$i] = $answerVerb->getPast()[$i];
    }
    
    
    $correcting = $answerVerb->Correction($correctVerb->getPast(), $answerVerb->getPast());
    for ($i = 0; $i < count($correcting); $i++) {
        
        if ($correcting[$i] == "0") {
            $coloring[$i] = "color: #64FF76";
        }else{
            $coloring[$i] = "color: #FF7C64";
            $correction[$i] = $correcting[$i];
        }
    }
    
    
}

?>