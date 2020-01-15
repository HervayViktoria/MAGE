<?php
require_once 'everyIncHasIt.inc.php';
//$db = new Database();
$verb = new Verb();
$errorMessage = "";
$successMessage = "";
$errorVisible = "display: none";
$successVisible = "display: none";


function EchoName(){
    global  $db;
    $sql = "SELECT `user_name` FROM `users` WHERE `user_id` ='". $_SESSION['u_id']."';";
    $table = $db->Query($sql);
    $name = $table[0][0];
    return $name;
}

function EditVerbs(){
    //mikor megtörténik a törlés/szerkesztés unset-elni kell, hogy refreshre ne csinálja meg még egyszer!!!
    $_SESSION['deleteVerb'] = "deleted";
    global $db;
    $sql = "SELECT `user_id`,`user_input_id`, `user_infinitive`,`user_meaning`, `user_ich`,`user_du`,`user_ese`,`user_wir`,`user_ihr`,`user_sie`,`user_prat`,`user_aux`,`user_perfekt` FROM `user_input` WHERE `user_id` ='".$_SESSION['u_id']."';";
    $table = $db->Query($sql);
    if ($table === 0) {
        
        echo '<div class="row mx-2">
                
                    <h3 style="margin: 20px auto;">Nincs hozzáadott ige!</h3>
           </div>';
        
    }else{ 
            for ($i = 0; $i < count($table); $i++) {

                  echo 
'<div class="myBorder my-3">
    <div>
        <div class="myCenter">
           <div class="Success" name="'.$i.'" style="display: none;"></div>
        </div>
        <div class="myCenter">
            <div class="Error" name="'.$i.'" style="display: none;"></div>
        </div>
    </div>
    <div class="row mx-2 my-2">
        <div class="col-md-6">
            <div class="myCenter">
                 <label>Főnévi igenév:</label>
            </div>
            <div class="myCenter">
                 <input type="text" name="'.$i.'" disabled value="'.$table[$i][2].'"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="myCenter">
                <label>Jelentés:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][3].'"/>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Ich:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][4].'"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Du:</label>
             </div>
             <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][5].'"/>
             </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Er/sie/es:</label>
             </div>
             <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][6].'"/>
             </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Wir:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][7].'"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Ihr:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][8].'"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Sie/sie:</label>
            </div>
            <div class="myCenter">
                <input  type="text" name="'.$i.'" disabled value="'.$table[$i][9].'"/>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Präteritum:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][10].'"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Segédige:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][11].'"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Prefekt:</label>
            </div>
            <div class="myCenter">
                <input type="text" name="'.$i.'" disabled value="'.$table[$i][12].'"/>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-md-6 myCenter">
                <button class="btn my-2" name="'.$i.'" onClick="EditVerb(this)">Szerkesztés</button>
                <button class="btn my-2" id="'.$i.'" name="'.$table[$i][1].'" style="display: none; margin: 0 auto;" onClick="SaveVerb(this)">Mentés</button>
        </div>
        <div class="col-md-6 myCenter">
                    <form action="editProfil.php" method="POST">
                <button class="btn my-2" type="submit" name="deleted_verb" value="'.$table[$i][1].'" onClick="DeleteVerb(this)">Törlés</button>
                    </form>
        </div>

    </div>       
 </div>';
            }     

    }
    
}





if (isset($_POST['updated_name'])) {

    $newName = $db->RealEscapeString($_POST['new_name']);
    if (empty($newName)) {
        $errorMessage = "Nem adott meg új nevet!";
        $errorVisible = "display: block";
        
    }else{
        
      $sql = "UPDATE `users` SET `user_name`= '".$newName."' WHERE `user_id` = '".$_SESSION['u_id']."';";
      $db->NonQuery($sql);
      $_SESSION['u_name'] = $newName;
      $successVisible = "display: block";
      $successMessage = "Felhasználónév megváltoztatva";
        
    }

    
}


if (isset($_POST['updated_pass'])) {
    if (empty($_POST['new_pass_1']) || empty($_POST['new_pass_2'])) {
         $_SESSION['wrong_pass'] = "wrong";
        header("Location: ../pages/editProfil.php");
    }
    else if ($_POST['new_pass_1'] === $_POST['new_pass_2']) {
        $pass = $db->RealEscapeString($_POST['new_pass_1']);
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `user_pass`= '".$hashedPass."' WHERE `user_id` = '".$_SESSION['u_id']."';";
        $db->NonQuery($sql);
        $successMessage = "Jelszó megváltoztatva";
        $successVisible = "display: block";
                
    }else{
        $_SESSION['wrong_pass'] = "wrong";
        header("Location: ../pages/editProfil.php");
        
    }

    
}

if (isset($_POST['updated_verbs'])) {
    $inputId = $_POST['input_id'];
   echo $inputId;
    $verb->setAll($_POST['updated_verbs'][0], $_POST['updated_verbs'][1], $_POST['updated_verbs'][2], $_POST['updated_verbs'][3], $_POST['updated_verbs'][4], $_POST['updated_verbs'][5], $_POST['updated_verbs'][6], $_POST['updated_verbs'][7], $_POST['updated_verbs'][8], $_POST['updated_verbs'][9], $_POST['updated_verbs'][10]);
    $verb->UpdateVerbInDB($verb->getAll(), $inputId);
   
}

if (isset($_POST['deleted_verb'],$_SESSION['deleteVerb'])) {
    
    $verb->DeleteVerbFromDB($_POST['deleted_verb']);
    $successMessage = "Ige törölve";
    $successVisible = "display: block";
    unset($_SESSION['deleteVerb']);
}


        
?>