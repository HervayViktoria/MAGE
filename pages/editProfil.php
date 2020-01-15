<?php
require_once '../templates/headOfEveryPage.php';
    Head('Profil');
require_once '../includes/editProfil.inc.php';
?>

<?php 
if (isset($_SESSION['wrong_pass'])) {
    $errorVisible = "display: block";
    $errorMessage = "Sikertelen!";
?>
<div class="message Error" style="<?php echo $errorVisible?>">
    <?php echo $errorMessage ?>
</div>
    <div class="myBorder">
        <form action="profil.php" method="POST">
            <div class="row mx-2" style="margin-top: 30px;">
                <div class="col-md"></div>
                <div class="col-md-3 my-2">
                    <div class="myCenter">
                        <input class="d-block" style="margin-bottom: 5px;" type="text" autocomplete="off" name="new_pass_1" placeholder="Jelszó">
                    </div>
                    <div class="myCenter">
                        <input  class="d-block" type="password" name="new_pass_2" placeholder="Jelszó újra">
                    </div>
                   
                </div>
                <div class="col-md"></div>
           
            </div>
            <div class="myCenter row mx-2">
                    <div class="myCenter col-md-3 my-2">
                       <button type="submit" name="updated_pass" class="btn mx-3" style="border: 1px solid black;">OK</button>
                    </div>
            </div>
        </form>
</div>
<?php unset($_SESSION['wrong_pass']);}?>

<?php 
if (isset($_POST['name'])) { ?>
 <div class="myBorder">
      <form action="profil.php" method="POST">
          <div class="myCenter row mx-2" style="margin-top: 30px;">
              <div class="col-md-6">
                  <div class="myCenter">
                    <h5>Felhasználónév: </h5>
                  </div>
                  <div class="myCenter">
                    <input type="text" name="new_name" value="<?php echo EchoName();?>"/>
                  </div>
              </div>
          </div>
          <div class="myCenter row mx-2 my-3">
              <div class="col-md-6">
                  <div class="myCenter">
                    <button type="submit" name="updated_name" class="btn" style="border: 1px solid black;">OK</button>
                  </div>
              </div>
           </div> 
      </form>

</div>
     


<?php }?>

<?php 
if (isset($_POST['pass'])) { ?>
  <div class="myBorder">
        <form action="profil.php" method="POST">
            <div class="row mx-2" style="margin-top: 30px;">
                <div class="col-md"></div>
                <div class="col-md-3 my-2">
                    <div class="myCenter">
                        <input class="d-block" style="margin-bottom: 5px;" type="text" autocomplete="off" name="new_pass_1" placeholder="Jelszó">
                    </div>
                    <div class="myCenter">
                        <input  class="d-block" type="password" name="new_pass_2" placeholder="Jelszó újra">
                    </div>
                   
                </div>
                <div class="col-md"></div>
            </div>
            <div class="myCenter row mx-2">
                    <div class="myCenter col-md-3 my-2">
                       <button type="submit" name="updated_pass" class="btn mx-3" style="border: 1px solid black;">OK</button>
                    </div>
            </div>
        </form>
</div>


<?php }?>

<?php if (isset($_POST['edit_verbs'])) { ?>
   


<?php EditVerbs(); ?>
    
    
    
<?php    
} ?>
<?php if(isset($_POST['delete'])){?>
    <div class="myBorder row mx-2 my-2 py-2">
        <div class="col-md"></div>
        <div class="col-md-6">
            <h3 style="text-align: center;">Biztosan törölni szeretné a fiókját?</h3>
            <form action="../includes/delete.inc.php" method="POST">
                <div class="myCenter">
                    <button class="btn mx-2"  type="submit" name="delete">Igen</button>
                     <button class="btn"  type="submit" name="nodelete">Nem</button>
                </div>
                
            </form>
        </div>
        <div class="col-md"></div>
    </div>
<?php }?>
<?php 
require_once '../templates/jquery.php'; ?>
<script type="text/javascript" src="../scripts/editVerbs.js"></script>
<script>
    FadeOut();
</script>
<?php
require_once '../templates/endOfFile.php';
?>