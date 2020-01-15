<?php
//ez felelős a teszt elmentéséért az adatbázisba
session_start();
require_once 'everyIncHasIt.inc.php';
$verb = new Verb();
//ajaxal megkapjuk a válaszokat
$answers = $_POST['answers'];
//illetve a kiszámolt %-ot
$result = $_POST['result'];
$infinitivies = $_POST['infinitives'];
//a session id alapján töröljük az adott user utolsó tesztjét
$id = $_SESSION['u_id'];

$delete = "DELETE FROM `test_answers` WHERE `user_id` ='".$id."';";
$db->NonQuery($delete);

$tenAnswers = array();
//a teszt időpontját is elmentjük
$time = (new \DateTime())->format('Y-m-d');
$countInf = 0;
//mivel ez az oldal egy viszonylag nagy tömbböt kapott meg, ahhoz hogy el tudjuk menteni kisebbra kell darabolni
for ($i = 0; $i < count($answers); $i++) {
    //elkezdjük beletenni a nagy array adatait a kisebbe
    array_push($tenAnswers,$answers[$i]);
   //mikor 10 darab adat van benne
    if (count($tenAnswers) == 10) {
        
        $verb->setAll($infinitivies[$countInf++], $tenAnswers[0], $tenAnswers[1], $tenAnswers[2], $tenAnswers[3], $tenAnswers[4], $tenAnswers[5], $tenAnswers[6], $tenAnswers[7], $tenAnswers[8], $tenAnswers[9]);
    //akkor betöltjük az adatbázisba       
        
    $verb->SaveVerbToDB($verb->getAll(), $id, $result);
    //aztán töröljük a tömb tartalmát
    unset($tenAnswers);
    $tenAnswers = array();
    unset($verb);
    $verb = new Verb();
     }
}




