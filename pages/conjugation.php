<?php 

require_once '../templates/headOfEveryPage.php';
        Head('Ragozás');
require_once '../includes/conjugation.inc.php';
//require_once '../includes/dropdownType.inc.php';
 
?>

<link rel="stylesheet" type="text/css" href="../css/correction.css"/>

<div class="myBorder">      
<form action="conjugation.php" method="POST">  
    <div class="row mx-2">
        <div class="col">
        </div>
        <div class="col-md-4 myCenter" style="margin-top: 15px;">
             <a class="nav-link dropdown-toggle" href="#" id="myDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Igék listája
                </a>
            <div class="dropdown-menu scrollable-menu" role="menu" style="overflow: scroll; overflow-x: hidden;" id="verbs" aria-labelledby="navbarDropdown">
                   <?php
                        require_once '../includes/dropdown.inc.php';

                        DropDown($_SESSION['type']);
                   ?>
            </div>
            
            

        </div>
        <div class="col">
        </div>
    </div>
<!-- ha nem válaszott ki igét ide jön a hibaüzenet-->
<div style="text-align: center;">
    <span id="noVerb"  ><?php echo $error?></span>
</div>
<!-- ide várja, hogy mi lesz a kiválaszott ige-->
<input type="hidden" name="chosenVerb" id="chosenVerb"/>
<div class="row mx-4" style="margin-bottom: 10px;">
    <div class="col-md-4">
        <!--ich -->
        <div class="myCenter">
            <label>Ich:</label>
        </div>
        <div class="myCenter">
            <input type="text" autocomplete="off" style="<?php echo $coloring[0];?>;text-shadow: 0.5px 0.5px black;" name="Ich" class="input" value="<?php echo $answer[0];?>"/>
        </div>
        <div class="myCenter">
            <span class="correct" ><?php  echo $correction[0]; ?></span>
        </div>
    </div>
    <div class="col-md-4">
    <!--du -->
     <div class="myCenter">
        <label>Du:</label>
     </div>
     <div class="myCenter">
        <input type="text" autocomplete="off" style="<?php echo $coloring[1];?>; text-shadow: 0.5px 0.5px black;" name="Du" class="input" value="<?php echo $answer[1];?>"/>
     </div>
     <div class="myCenter">
        <span class="correct" ><?php  echo $correction[1]; ?></span> 
     </div>
     </div>
    <div class="col-md-4">
    <!--ese -->
     <div class="myCenter">
        <label>Er/sie/es:</label>
     </div>
     <div class="myCenter">
        <input type="text" autocomplete="off" style="<?php echo $coloring[2];?>; text-shadow: 0.5px 0.5px black;" name="Ese" class="input" value="<?php echo $answer[2];?>"/>
     </div>
     <div class="myCenter">
         <span class="correct" ><?php  echo $correction[2]; ?></span>
     </div>
    </div>
</div>


<div class="row mx-4">
     <div class="col-md-4">
        <!--wir -->
         <div class="myCenter">
            <label>Wir:</label>
         </div>
         <div class="myCenter">
            <input type="text" autocomplete="off" style="<?php echo $coloring[3];?>; text-shadow: 0.5px 0.5px black;" name="Wir" class="input" value="<?php echo $answer[3];?>"/>
         </div>
         <div class="myCenter">
            <span class="correct" ><?php  echo $correction[3]; ?></span> 
         </div>
     </div>
     <div class="col-md-4">
        <!--ihr -->
         <div class="myCenter">
            <label>Ihr:</label>
         </div>
         <div class="myCenter">
            <input type="text" autocomplete="off" style="<?php echo $coloring[4];?>; text-shadow: 0.5px 0.5px black;" name="Ihr" class="input" value="<?php echo $answer[4];?>" />
         </div>
         <div class="myCenter">
            <span class="correct" ><?php  echo $correction[4]; ?></span>
         </div>
     </div>
     <div class="col-md-4">
        <!--sie -->
         <div class="myCenter">
            <label>Sie/sie</label>
         </div>
         <div class="myCenter">
            <input type="text" autocomplete="off" style="<?php echo $coloring[5];?>; text-shadow: 0.5px 0.5px black;" name="Sie" class="input" value="<?php echo $answer[5];?>"/>
         </div>
         <div class="myCenter">
            <span class="correct" ><?php  echo $correction[5]; ?></span>
         </div>
     </div>
</div>
<div class="row my-2 mx-2">
    <div class="col">
    </div>
    <div class="col-md-4 myCenter">
        <button type="submit" name="correction" class="btn my-4" >Ellenőrzés</button>
    </div>
    <div class="col">
    </div>

</div>
    </form>
</div>







<?php require_once '../templates/jquery.php'; ?>

<?php
require_once '../templates/endOfFile.php';
?>