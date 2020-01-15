<?php 

require_once 'everyIncHasIt.inc.php';
$errorVisible = 'opacity: 0';  
$errorMessage = ' ';
$last = ' ';
$first = ' ';
$email = ' ';
$uname = ' ';

    if (isset($_POST['submit'])) {
        $last = $_POST['last'];
        $first = $_POST['first'];
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $errorMessage = $user->SignUp($_POST['first'], $_POST['last'], $_POST['uname'], $_POST['email'], $_POST['pwd1'], $_POST['pwd2']);
        
           if ($errorMessage != 1) {
               $errorVisible = "opacity: 1";
           }else{
               header("Location: ../pages/login.php");
           }
    }


 ?>