<?php 
	if (isset($_POST['submit'])) {
		//ahhoz, hogy ki tudjuk törölni, először el kell indítani
		session_start();
		//az session változókat törli
		session_unset();
		//törli a sessiont magát
		session_destroy();
                
		header("Location: ../index.php");
		

	}

 ?>