<?php
require_once 'everyIncHasIt.inc.php';
function Table(){
    global $db;
//jelentés oldalon lekérdezzük a magyar és a német főnévi igeneveket
$sql = "SELECT `hun`, `infinitive` FROM `allverbs`;";
$table = $db->Query($sql);
//majd megjelenítjük egy táblázatban
$ranNum = Tools::RandomNumbers(count($table),5);
             for ($index = 0; $index < count($ranNum); $index++) {
                 
                  echo '<div class="row mx-2">
                            <div class="col">
                            </div>
                            
                            <div class="col-md-4">
                                <div class="myCenter hunVerbs">
                                    <div class="hungarian" data-value="'.$table[$ranNum[$index]-1][1].'">'.$table[$ranNum[$index]-1][0].'</div>
                                 </div>                       
                            </div>
                            
                            <div class="col-md-4">
                                <div class="myCenter mx-2">
                                    <input type="text" class="answers mx-2"/>
                                </div>
                                <div class="myCenter">
                                    <span class="correct"></span>
                                </div>
                            </div>  
                            
                            <div class="col">
                            </div>
                        </div>';
             }

}

?>