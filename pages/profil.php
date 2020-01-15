<?php
require_once '../templates/headOfEveryPage.php';
    Head('Profil');
require_once '../includes/editProfil.inc.php';
?>

<div class="message Error" style="<?php echo $errorVisible?>">
    <?php echo $errorMessage ?>
</div>
<div class="message Success" name="1" style="<?php echo $successVisible?>">
    <?php echo $successMessage ?>
</div>
<div class="row mx-2">
    <div class="col-md-4">
        <form action="testView.php" method="POST">
           <div class="myBorder">
              <div class="card-body flex myCenter">   
                <button type="submit" name="test" class="btn" style="border: 1px solid black;">Teszt megtekintése</button>
              </div>
            </div>  
        </form>
    </div>
    <div class="col-md-4">
        <form action="addVerbs.php" method="POST">
           <div class="myBorder my-2">
               <div class="card-body myCenter">   
                <button type="submit" name="verb" class="btn" style="border: 1px solid black;">Ige hozzáadás</button>
              </div>
            </div>  
        </form>
    </div>
    <div class="col-md-4">
        <form action="editProfil.php" method="POST">
           <div class="myBorder my-2">
              <div class="card-body flex myCenter">   
                <button type="submit" name="edit_verbs" class="btn" style="border: 1px solid black;">Hozzáadott igék szerkesztése</button>
              </div>
            </div>  
        </form>
    </div>
</div>
<div class="row mx-2">
    <div class="col-md-4">
        <form action="editProfil.php" method="POST">
           <div class="myBorder my-2">
              <div class="card-body flex myCenter">   
                 <button type="submit" name="name" class="btn" style="border: 1px solid black;">Felhasználónév megváltoztatása</button>
              </div>
            </div>  
        </form>
    </div>
    
    <div class="col-md-4">
        <form action="editProfil.php" method="POST">
           <div class="myBorder my-2">
              <div class="card-body flex myCenter">   
                <button type="submit" name="pass" class="btn" style="border: 1px solid black;">Jelszó megváltoztatása</button>
              </div>
            </div>  
        </form>
    </div>
    
    <div class="col-md-4">
        <form action="editProfil.php" method="POST">
          <div class="myBorder my-2">
             <div class="card-body flex myCenter">   
               <button type="submit" name="delete" class="btn" style="border: 1px solid black;">Regisztráció törlése</button>
             </div>
           </div>  
       </form>
    </div>
</div>

<?php 
require_once '../templates/jquery.php';?>
<!--<script type="text/javascript" src="../scripts/profil.js"></script>-->
<script>
    FadeOut();
</script>
<?php
require_once '../templates/endOfFile.php';
?>