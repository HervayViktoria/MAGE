<?php  
    require_once '../templates/headOfEveryPage.php';
        Head('Regisztráció');
        require_once '../includes/signup.inc.php';
?>

<div class="message Error" style="<?php echo $errorVisible?>">
    <?php echo $errorMessage ?>
</div>
<div class="myBorder">
    <form action="signup.php" method="POST">	
        <div class="myCenter row mx-2" style="margin-top: 30px;">
            <p>Regisztráció</p>
        </div>
        <div class="row mx-2">
            <div class=" signUpStyle col-md-6">
                <label>Vezetéknév:</label>
                <input type="text" autocomplete="off" name="last" value="<?php echo $last ?>">
            </div>
            <div class="signUpStyle col-md-6">
                <label>Keresztnév:</label>
                 <input type="text" autocomplete="off" name="first"  value="<?php echo $first ?>">
            </div>
        </div>
        <div class="row mx-2">
            <div class="signUpStyle col-md-6">
                <label>Felhasználónév:</label>
                <input type="text" autocomplete="off" name="uname"  value="<?php echo $uname ?>">
            </div>
            <div class="signUpStyle col-md-6" >
                <label>Email cím:</label>
                <input type="text" autocomplete="off" name="email"  value="<?php echo $email ?>">
            </div>
           
        </div>
        <div class="row mx-2">
            <div class="signUpStyle col-md-6">
                <label>Jelszó:</label>
                <input type="password" name="pwd1">
            </div>
            <div class="signUpStyle col-md-6">
                   <label>Jelszó újra:</label>
                <input type="password" name="pwd2">
            </div>
           
        </div>
        <div class="myCenter row my-2 mx-2">
            <div class="myCenter col-md-6">
                <button type="submit" class="btn btn-primary" name="submit">OK</button>
            </div>
        </div>
    </form>
</div>
<?php require_once '../templates/jquery.php';
?>
<script>
   FadeOut();
</script>
<?php
 require_once '../templates/endOfFile.php';
?>