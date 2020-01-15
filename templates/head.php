<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');
 ?>
<!DOCTYPE html>
<html lang="hu">
<?php 
	$rootPath = '/DEMO';
 ?>
<head>
	
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">    
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
   
  <link rel="stylesheet" type="text/css" href="<?php echo "$rootPath";?>/css/thirdParty.css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo "$rootPath";?>/css/style.css"/>
	

	<title>
			<?php if (defined('TITLE')) {
				echo TITLE;
			}else{
				echo 'DEMO';
			}


			 ?>


	</title>
    <link rel="icon" type="image/ico" href="<?php echo $rootPath; ?>/img/magic_wizard_hat-512.png" />
</head>
<body>
    
	

