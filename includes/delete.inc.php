<?php
require_once 'everyIncHasIt.inc.php';
if (isset($_POST['delete'])) {
                //ahhoz, hogy ki tudjuk törölni, először el kell indítani
		session_start();
                $user->DeleteUser($_SESSION['u_id']);
		//az session változókat törli
		session_unset();
		//törli a sessiont magát
		session_destroy();
                
		header("Location: ../index.php");

    
}

if (isset($_POST['nodelete'])) {
    
    header("Location: ../index.php");
    
}