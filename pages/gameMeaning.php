<?php 
    require_once '../templates/headOfEveryPage.php';
        Head('Játék');

?>
<link rel="stylesheet" type="text/css" href="../css/gameMeaning.css"/>
<?php

if (!isset($_SESSION['u_id'])) {
	echo '<p>Csak regisztrált felhasználóknak</p>';
}else{
	
    echo '<div class="row mx-2">
            <div class="col-md"></div>
            <div class="col-md-6">
                    
                        <div class="myBorder my-2" id="sign">
                            <h3 style="text-align: center;">Válassza ki az ige német megfelelőjét!</h3>
                        </div>
                    
                    <div class="myCenter">
                        <div id="success">
                            <div class="myCenter">
                                    <h2>Helyes!</h2>
                            </div>

                                    <table>
                                            <tr>
                                                    <td><button class="btn" onclick="Refresh()">Új játék</button></td>
                                                    <td><button class="btn" onclick="IndexPage()">Kezdőlap</button></td>
                                            </tr>

                                    </table>
                        </div>
                    </div>
             </div>
            <div class="col-md"></div>
        </div>';
  echo '<div class="myBorder" style="padding-top: 25px; padding-bottom: 25px;">';         
    require_once '../includes/games.inc.php';
    Meaning();
           
    }
    echo '</div>';
?>
    

    
<?php
require_once '../templates/jquery.php'; 
?>
<script type="text/javascript" src="../scripts/gameMeaning.js"></script>   
<?php
require_once '../templates/endOfFile.php';
?>