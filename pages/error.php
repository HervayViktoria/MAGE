<?php
session_start();
echo 'Error page!<br>';
if (isset($_SESSION['error']) ) {
	echo 'A probléma oka: '. $_SESSION['error'];
}

