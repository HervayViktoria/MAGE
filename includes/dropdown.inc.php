<?php //


function DropDown($input = "main"){
    global $db;

    switch ($input) {
        
    case "main":
    //RAgozás és múlt idő oldalakon ugyanarra a legördülő menüre van szükségünk
 $sql = "SELECT `infinitive` FROM `allverbs`";
 $table = $db->Query($sql);
 //a lekérdezés után létre is hozzuk
 for ($i = 0; $i < count($table); $i++) {
    echo '<a class="dropdown-item dropdownVerbs" onclick="SelectVerb(this)" data-value='.$table[$i][0].'>'.$table[$i][0].'</a>';
}
        break;
        
    case "own":
         //Ragozás és múlt idő oldalakon ugyanarra a legördülő menüre van szükségünk
         $id = $_SESSION['u_id'];
         $sql = "SELECT `user_infinitive` FROM `user_input` WHERE `user_id` = '".$id."';";
         $table = $db->Query($sql);
         if ($table == 0) {
           
//             header('Location: ../pages/addVerbs.php');
             echo '<meta http-equiv="refresh" content="0; URL=/DEMO/pages/addVerbs.php">';
             
         }else{
            //a lekérdezés után létre is hozzuk
            for ($i = 0; $i < count($table); $i++) {
                echo '<a class="dropdown-item dropdownVerbs" onclick="SelectVerb(this)" data-value='.$table[$i][0].'>'.$table[$i][0].'</a>';
               }
         }

        break;
    case "modalverb":
        
        $sql = "SELECT `infinitive` FROM `allverbs` WHERE `modalverb` = 1;";
        $table = $db->Query($sql);
         for ($i = 0; $i < count($table); $i++) {
            echo '<a class="dropdown-item dropdownVerbs" onclick="SelectVerb(this)" data-value='.$table[$i][0].'>'.$table[$i][0].'</a>';
        }
        break;
    case "reflexive":
        $sql = "SELECT `infinitive` FROM `allverbs` WHERE `reflexive` = 1;";
        $table = $db->Query($sql);
         for ($i = 0; $i < count($table); $i++) {
            echo '<a class="dropdown-item dropdownVerbs" onclick="SelectVerb(this)" data-value='.$table[$i][0].'>'.$table[$i][0].'</a>';
        }
        
        break;
    case "simple":
        $sql = "SELECT `infinitive` FROM `allverbs` WHERE `simple` = 1;";
        $table = $db->Query($sql);
         for ($i = 0; $i < count($table); $i++) {
            echo '<a class="dropdown-item dropdownVerbs" onclick="SelectVerb(this)" data-value='.$table[$i][0].'>'.$table[$i][0].'</a>';
        }
        
        break;
}

}
?>