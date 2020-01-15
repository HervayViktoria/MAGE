<?php 
    require_once '../templates/headOfEveryPage.php';
        Head('Múlt idő');
     require_once '../includes/pasttense.inc.php';
?>


<link rel="stylesheet" type="text/css" href="../css/correction.css"/>


<div class="myBorder">      
    <form action="pasttense.php" method="POST">  
    <div class="row mx-2">
        <div class="col">
        </div>
        <div class="col-md-4 myCenter" style="margin-top: 15px;">
             <a class="nav-link dropdown-toggle" href="#" id="myDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Igék listája
                </a>
            <div class="dropdown-menu scrollable-menu" role="menu" style="overflow: scroll; overflow-x: hidden;"  id="verbs" aria-labelledby="navbarDropdown">
              
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
<span id="noVerb"  ><?php echo $error?></span></br>
<!-- ide várja, hogy mi lesz a kiválaszott ige-->
<input type="hidden" name="chosenVerb" id="chosenVerb"/>
<div class="row mx-2" style="margin-bottom: 10px;">
    <div class="col-md-4">
    <!--Präteritum -->
    <div class="myCenter">
        <label>Präteritum:</label>
    </div>
    <div class="myCenter">
        <input type="text" style="<?php echo $coloring[0];?>;text-shadow: 0.5px 0.5px black;" name="prat" class="input" value="<?php echo $answer[0];?>"/>
    </div>
    <div class="myCenter">
        <span class="correct" ><?php  echo $correction[0]; ?></span>
    </div>
    </div>
     <div class="col-md-4">
    <!--segédige -->
     <div class="myCenter">
        <label>Segédige:</label>
     </div>
     <div class="myCenter">
        <input type="text" style="<?php echo $coloring[1];?>; text-shadow: 0.5px 0.5px black;" name="aux" class="input" value="<?php echo $answer[1];?>"/>
     </div>
     <div class="myCenter">
        <span class="correct" ><?php  echo $correction[1]; ?></span> 
     </div>
     </div>
    <div class="col-md-4">
    <!--perfekt -->
     <div class="myCenter">
        <label>Perfekt:</label>
     </div>
     <div class="myCenter">
        <input type="text" style="<?php echo $coloring[2];?>; text-shadow: 0.5px 0.5px black;" name="perfekt" class="input" value="<?php echo $answer[2];?>"/>
     </div>
     <div class="myCenter">
         <span class="correct" ><?php  echo $correction[2]; ?></span>
     </div>
      </div>
</div>
<div class="row my-2 mx-2">
    <div class="col">
    </div>
    <div class="col-md-4 myCenter">
        <input type="submit" name="correction" class="btn my-4" value="Ellenőrzés" />
    </div>
    <div class="col">
    </div>

</div>


  </form>
</div>

<?php 
    require_once '../templates/jquery.php'; ?>

<?php
    require_once '../templates/endOfFile.php';  
?>


