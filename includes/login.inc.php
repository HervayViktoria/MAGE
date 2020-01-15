<?php 
require_once 'everyIncHasIt.inc.php';
    $errorVisible = 'opacity: 0';  
    $errorMessage = ' ';

if (isset($_POST['submit'])) {
          $user = new User();
          $errorMessage = $user->Login($_POST['uname'], $_POST['pwd']);
          if ($errorMessage != 1) {
              $errorVisible = 'opacity: 1';
          }else{
              header("Location: ../index.php?login=success");
          }
                      


    
    }
		
              

	
 ?>