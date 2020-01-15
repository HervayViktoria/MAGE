<?php
session_start();
//itt látja rögtön a befrissített type-ot viszont a conjugation oldalon, ahol adropdown meghívódik és fontos lenne, hogy lássa ott csak egy plusz oldalfrissülés után látja a kiválasztott type-ot T_T
$_SESSION['type'] = $_POST['typeOfDropdown'];
echo $_SESSION['type'];

