<nav class="navbar navbar-dark navbar-expand-lg  fixed-top px-0" style="margin-bottom: 10px;">
  <a class="navbar-brand" style="font-weight: bold; margin-left: 15px;"><i class="fa mx-2 fa-magic"></i>MAGE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link mx-2" href="<?php echo "$rootPath";?>/index.php"><i class="fa mx-2 fa-home"></i>Kezdőlap<span class="sr-only">(current)</span></a>
      </li>
          <?php if (isset($_SESSION['u_id'])) {
                     ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo "$rootPath";?>/pages/dropdownSelector.php"><i class="fa mx-2 fa-pencil"></i>Igék Ragozása</a>
      </li>
        <?php
            }else{
        ?>
        <li class="nav-item">
              <a class="nav-link" href="<?php echo "$rootPath";?>/pages/conjugation.php"><i class="fa mx-2 fa-pencil"></i>Igék Ragozása</a>
        </li>       
         <?php
            $_SESSION['type'] = "main";
           }
         ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo "$rootPath";?>/pages/meaning.php"><i class="fa mx-2 fa-pencil-square-o"></i>Jelentés</a>
            </li>   
	<?php if (isset($_SESSION['u_id'])) {
                     ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo "$rootPath";?>/pages/dropdownSelectorForPast.php"><i class="fa mx-2 fa-clock-o"></i>Múlt idő</a>
      </li>
        <?php
            }else{
        ?>
        <li class="nav-item">
              <a class="nav-link" href="<?php echo "$rootPath";?>/pages/pasttense.php"><i class="fa mx-2 fa-clock-o"></i>Múlt idő</a>
        </li>       
         <?php
             }
         ?>   
            
        
            <li class="nav-item">
              <a class="nav-link" href="<?php echo "$rootPath";?>/pages/test.php"><i class="fa mx-2 fa-star"></i>Teszt</a>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa mx-2 fa-gamepad"></i>
                  Játékok
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo "$rootPath";?>/pages/gameConjug.php">Hogyan ragozzuk?</a>
                  <a class="dropdown-item" href="<?php echo "$rootPath";?>/pages/gameMeaning.php">Mit jelent?</a>
                </div>
            </li>
        </ul>
       <ul class="navbar-nav navbar-right">
            <?php 
			if (isset($_SESSION['u_id'])) {
				echo '<li class="nav-item"><form action="'.$rootPath.'/includes/logout.inc.php" method="POST">
		 			<button type="submit" class="btn nav-link" name="submit" style="font-size: 20px;"><i class="fa mx-2 fa-sign-out"></i>Kijelentkezés</button>
		 		</form></li>
                                <li class="nav-item"><a class="nav-link" style="font-size: 20px; margin-right: 15px;" href="'.$rootPath.'/pages/profil.php"><i class="fa mx-2 fa-user"></i>Profil</a></li>';
                        }else{
                            
                            echo '
				<li ><a class="nav-link" href="'.$rootPath.'/pages/login.php"><i class="fa mx-2 fa-user"></i>Belépés</a></li>
                                <li ><a class="nav-link" href="'.$rootPath.'/pages/signup.php"><i class="fa mx-2 fa-user-plus"></i>Regisztráció</a></li>
				';
                            
                        }?>
       
      </ul>
    </div>
</nav>
<div class="container" id="specialCon" style="margin-top: 5rem;">
    <div id="main" class="py-2 px-2">

<?php                 if (isset($_SESSION['u_id']) ) {
	echo '<div class="hello ">Hello '. $_SESSION['u_firstname'].'</div>';
}

?>

