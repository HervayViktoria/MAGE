<?php
require_once 'everyIncHasIt.inc.php';

$db = new Database();
//százalék lekérdezése
$resultSql = "SELECT `result` FROM `test_answers` WHERE `user_id` ='".$_SESSION['u_id']."' LIMIT 1;";
$result = $db->Query($resultSql);

function GeneratePage(){
    global $db;





//u_id alapján szükség van a főnévi igenevekre a test_answers-ből + $verb->setAll()
$sql = "SELECT `answer_infinitive`,`answer_meaning`,`answer_ich`,`answer_du`,`answer_ese`,`answer_wir`,`answer_ihr`,`answer_sie`,`answer_prat`,`answer_aux`,`answer_perfekt` FROM `test_answers` WHERE `user_id` = '".$_SESSION['u_id']."';";
$table = $db ->Query($sql);
if ($table === 0) {
     echo '<div class="row mx-2">
                
                    <h3 style="margin: 20px auto;">Még nem töltött ki egy tesztet sem!</h3>
           </div>';
}else{
//a visszaadott válaszokon végigmegyünk
for ($i = 0; $i < count($table); $i++) {
    $correctVerb = new Verb();
    $answerVerb = new Verb();
    $coloring = array_fill(0, 11, "color: #64FF76;");
    $correction = array_fill(0, 11, " ");
    //az összesnek a nulladik eleme a főnévi igenév, az alapján lekérdezzük a helyes megoldásokat
    $sql = "SELECT `infinitive`,`hun`,`ich`,`du`,`ese`,`wir`,`ihr`,`sie`,`prateritum`,`auxiliary`,`perfekt` FROM `allverbs` WHERE `infinitive` = '".$table[$i][0]."';";
    $tableForCorrectVerb = $db->Query($sql);
 
    $correctVerb->setAll($tableForCorrectVerb[0][0], $tableForCorrectVerb[0][1], $tableForCorrectVerb[0][2], $tableForCorrectVerb[0][3], $tableForCorrectVerb[0][4], $tableForCorrectVerb[0][5], $tableForCorrectVerb[0][6], $tableForCorrectVerb[0][7], $tableForCorrectVerb[0][8], $tableForCorrectVerb[0][9], $tableForCorrectVerb[0][10]);
    $answerVerb->setAll($table[$i][0], $table[$i][1], $table[$i][2], $table[$i][3], $table[$i][4], $table[$i][5], $table[$i][6], $table[$i][7], $table[$i][8], $table[$i][9], $table[$i][10]);
    $correctedArray = $correctVerb->Correction($correctVerb->getAll(), $answerVerb->getAll());

    for ($y = 0; $y < count($correctedArray); $y++) {
        if ($correctedArray[$y] == "0") {
            $correction[$y] = " ";
        }else{
            $coloring[$y] = "color: #FF7C64;";
            $table[$i][$y] = $correctedArray[$y];
        }
    }

    echo 
    '<div class="myBorder py-3 my-3"><div class="row mx-2">
      <div class="col-md"></div>
        <div class="col-md-6"><div class="myCenter inf">
          '.$table[$i][0].
        '</div></div>
      <div class="col-md"></div> 
    </div>
    <div class="row mx-2">
        <div class="col-md"></div>
      <div class="col-md-6">
            <div class="myCenter">
                <label>Jelentés:</label>
            </div>
            <div class="myCenter">
                <input style="'.$coloring[1].'" type="text" disabled value="'.$table[$i][1].'"/>
            </div>
            <div class="myCenter">
                <span style="'.$coloring[0].'" class="correct" >'.$correction[1].'</span> 
            </div>
      </div>    
      <div class="col-md"></div>
    </div>
    
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Ich:</label>
            </div>
            <div class="myCenter">
                <input style="'.$coloring[2].'" type="text" disabled value="'.$table[$i][2].'"/>  
            </div>
            <div class="myCenter">
                 <span style="'.$coloring[1].'" class="correct" >'.$correction[2].'</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Du:</label>
            </div>
            
            <div class="myCenter">
                 <input style="'.$coloring[3].'" type="text" disabled value="'.$table[$i][3].'"/>
            </div>
            
            <div class="myCenter">
                  <span style="'.$coloring[2].'" class="correct" >'.$correction[3].'</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                 <label>Er/sie/es:</label>
            </div>
            
            <div class="myCenter">
                 <input style="'.$coloring[4].'" type="text" disabled value="'.$table[$i][4].'"/>
            </div>
            
            <div class="myCenter">
                 <span style="'.$coloring[3].'" class="correct" >'.$correction[4].'</span> 
            </div>
        </div>   
    </div>
    
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Wir:</label>
            </div>
            <div class="myCenter">
                <input style="'.$coloring[5].'" type="text" disabled value="'.$table[$i][5].'"/>
            </div>
            <div class="myCenter">
                <span style="'.$coloring[4].'" class="correct" >'.$correction[5].'</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                 <label>Ihr:</label>
            </div>
            <div class="myCenter">
                  <input style="'.$coloring[6].'" type="text" disabled value="'.$table[$i][6].'"/>
            </div>
            <div class="myCenter">
                  <span style="'.$coloring[5].'" class="correct" >'.$correction[6].'</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                 <label>Sie/sie:</label>
            </div>
            <div class="myCenter">
                  <input style="'.$coloring[7].'" type="text" disabled value="'.$table[$i][7].'"/>
            </div>
            <div class="myCenter">
                  <span style="'.$coloring[6].'" class="correct" >'.$correction[7].'</span> 
            </div>
        </div>              
    </div>
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Präteritum:</label>
            </div>
            <div class="myCenter">
                <input style="'.$coloring[8].'" type="text" disabled value="'.$table[$i][8].'"/>
            </div>
            <div class="myCenter">
                 <span style="'.$coloring[7].'" class="correct" >'.$correction[8].'</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Segédige:</label>
            </div>
            <div class="myCenter">
                  <input style="'.$coloring[9].'" type="text" disabled value="'.$table[$i][9].'"/>
            </div>
            <div class="myCenter">
                   <span style="'.$coloring[8].'" class="correct" >'.$correction[9].'</span> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Prefekt:</label>
            </div>
            <div class="myCenter">
                <input style="'.$coloring[10].'" type="text" disabled value="'.$table[$i][10].'"/>
            </div>
            <div class="myCenter">
                <span style="'.$coloring[9].'" class="correct" >'.$correction[10].'</span> 
            </div>
        </div>
   </div></div>';
    
      unset($answerVerb);
      unset($correctVerb);
}
}
}









?>

