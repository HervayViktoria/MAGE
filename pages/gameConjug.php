<?php 
        require_once '../templates/headOfEveryPage.php';
        Head('Játék');

?>
<link rel="stylesheet" type="text/css" href="../css/gameConjug.css"/>
<?php

if (!isset($_SESSION['u_id'])) {
	echo '<p>Csak regisztrált felhasználóknak</p>';
}else{
    
    echo '<div class="row mx-2 my-4">
            <div class="col-md"></div>
                <div class="col-md-6">
                    <div class="myBorder" id="sign">
                        <h3 style="text-align: center;">Húzza a ragozott alakokat a főnévi igenevekre!</h3>
                    </div>
                    <div class="myCenter">
                        <div id="success">
                                    <div class="myCenter">
                                        <h2>Hibátlan!</h2>
                                    </div>

                                        <table style="background-color: none;">
                                                <tr style="background-color: none;">
                                                        <td style="background-color: none;"><button class="btn mx-2" onclick="Refresh()" >Új játék</button></td>
                                                        <td style="background-color: none;"><button class="btn mx-2" onclick="IndexPage()">Kezdőlap</button></td>
                                                </tr>
                                        </table>

                        </div>
                    </div>
                </div>
           <div class="col-md"></div>
	</div>';
   
    require_once '../includes/games.inc.php';
        Conjug();
   
    
 
}
    
 ?>

        
<?php
 require_once '../templates/jquery.php';
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"> </script>

<script type="text/javascript" src="../scripts/gameConjug.js"></script>
<?php
require_once '../templates/endOfFile.php';
?>