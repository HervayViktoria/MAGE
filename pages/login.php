<?php 
    require_once '../templates/headOfEveryPage.php';
        Head('Belépés');
    require_once '../includes/login.inc.php';
 ?>
<div class="message Error" style="<?php echo $errorVisible?>">
    <?php echo $errorMessage ?>
</div>
<div class="myBorder">
   
    <form action="login.php" method="POST">
         <div class="myCenter row mx-2" style="margin-top: 30px;">
            <p>Bejelentkezés</p>
        </div>
       <div class="row mx-2">
           <div class="col-md"></div>
                <div class="col-md-6 my-2">
                    <div class="myCenter">
                        <input  style="margin-bottom: 5px;" type="text" autocomplete="off" name="uname" placeholder="Felhasználónév/email">
                    </div>
                    <div class="myCenter">
                        <input  type="password" name="pwd" placeholder="Jelszó">
                    </div>
                </div>
           <div class="col-md"></div>
           
        </div>
        <div class="myCenter row mx-2 my-2">
            <div class="myCenter col-md-6">
                <button type="submit" class="btn btn-primary" name="submit">OK</button>
            </div>
        </div>
    </form>
		
</div>

<?php 
    require_once '../templates/jquery.php';
?>
<script>
    FadeOut();
</script>
<?php
    require_once '../templates/endOfFile.php';
?>