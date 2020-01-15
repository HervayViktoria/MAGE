<?php
    require_once '../templates/headOfEveryPage.php';
        Head('Ige hozzáadása');
        require_once '../includes/addVerbs.inc.php';
?>
<link rel="stylesheet" type="text/css" href="../css/addVerbs.css"/>

<?php
if (!isset($_SESSION['u_id'])) {
    echo 'Lépjen be, vagy regisztráljon <br>
    <a href="'.$rootPath.'/pages/login.php">Belépés</a>
    <a href="'.$rootPath.'/pages/signup.php">Regisztráció</a>';
}else{
 ?>

    
 <div class="myBorder">
      <div class="card-header">
          <div class="myCenter">
              <h4>Ige hozzáadása</h4>
          </div>
          
          <div class="myCenter">
            <div class="Error" style="<?php echo $invisiblie;?>" >
                <?php echo $error;?>
            </div>
          </div>
          
          <div class="myCenter">
            <div class="Success" style="<?php echo $invisiblie;?>">
                <?php echo $success; ?>
            </div>
          </div>
      </div>
    <div class="row mx-2">
        <div class="col-md-6">
            <form action="addVerbs.php" method="POST">
            <div class="myCenter">
                <label>Főnévi igenév:</label>
            </div>
            <div class="myCenter">
                <input type="text" autocomplete="off" name="Infinitive" class="input" value="<?php echo $infinitive ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="myCenter">
                 <label>Jelentés:</label>
            </div>
            <div class="myCenter">
                <input type="text" autocomplete="off" name="Meaning" value="<?php echo $meaning ?>"/>
            </div>
        </div>
    </div>  
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Ich:</label>
            </div>
            <div class="myCenter">
                <input type="text" autocomplete="off" name="Ich" value="<?php echo $ich ?>"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Du:</label>
            </div>
            <div class="myCenter">
                <input type="text" autocomplete="off" name="Du" value="<?php echo $du ?>"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Er/sie/es:</label>
            </div>
            <div class="myCenter">
            <input type="text" autocomplete="off" name="Ese" value="<?php echo $ese ?>"/>
            </div>
        </div>
    </div>
     <div class="row mx-2">
         <div class="col-md-4">
             <div class="myCenter">
                <label>Wir:</label>
             </div>
             <div class="myCenter">
                <input type="text" autocomplete="off" name="Wir" value="<?php echo $wir ?>"/>
             </div>
         </div>
         <div class="col-md-4">
             <div class="myCenter">
                <label>Ihr:</label>
             </div>
             <div class="myCenter">
                <input type="text" autocomplete="off" name="Ihr" value="<?php echo $ihr ?>"/>
             </div>
         </div>
         <div class="col-md-4">
             <div class="myCenter">
                 <label>Sie/sie:</label>
             </div>
             <div class="myCenter">
                 <input type="text" autocomplete="off" name="Sie" value="<?php echo $sie ?>"/>
             </div>
         </div>
    </div>
    <div class="row mx-2">
        <div class="col-md-4">
            <div class="myCenter">
                <label>Präteritum:</label>
            </div>
            <div class="myCenter">
                <input type="text" autocomplete="off" name="Prat" value="<?php echo $prat ?>"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                <label>Segédige:</label>
            </div>
            <div class="myCenter">
                <input type="text" autocomplete="off" name="Aux" value="<?php echo $aux ?>"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="myCenter">
                 <label>Prefekt:</label>
            </div>
            <div class="myCenter">
                 <input type="text" autocomplete="off" name="Perf" value="<?php echo $perfekt ?>"/>
            </div>
        </div>
    </div>
     <div class="row mx-2">
         <div class="col-md"></div>
            <div class="col-md-6">
                <div class="myCenter">
                     <button class="btn my-2" name="submit" type="submit" id="addVerb">Hozzáadás</button>
                </div>
            </div>
             </form>
        <div class="col-md"></div>
    </div>
</div>
    
    
    
    
    

    



<?php
}
?>

                            
<?php
require_once '../templates/jquery.php';
?>
<script type="text/javascript" src="../scripts/addVerbs.js"></script>
<?php
require_once '../templates/endOfFile.php';
?>