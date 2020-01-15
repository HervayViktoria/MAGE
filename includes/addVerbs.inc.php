<?php

require_once 'everyIncHasIt.inc.php';


$infinitive = $meaning = $ich = $du = $ese = $wir = $ihr = $sie = $prat = $aux = $perfekt = $error = $success = '';
$invisiblie = "display: none";


if (isset($_POST['submit'])) {
   $_SESSION['addverb'] = "addverb";
    $verb = new Verb();
    $verb->setAll($_POST['Infinitive'],$_POST['Meaning'], $_POST['Ich'], $_POST['Du'], $_POST['Ese'], $_POST['Wir'], $_POST['Ihr'], $_POST['Sie'], $_POST['Prat'], $_POST['Aux'], $_POST['Perf']);
    $returnValue = $verb->SaveVerbToDB($verb->getAll(), $_SESSION['u_id']);
    
    if ($returnValue === 0) {
        
        $error = 'Egyik mező sem lehet üres!';
        $invisiblie = "display: block";
    }else if($returnValue === 1){
       
        $error = 'Ez az ige már hozzá van adva!';
        $invisiblie = "display: block";
    }else if($returnValue=== 2){
        $success = 'Ige hozzáadva az adatbázishoz!';
       
         $invisiblie = "display: block";
        
    }

 }else{

    }
