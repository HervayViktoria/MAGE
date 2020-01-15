<?php
    require_once '../templates/headOfEveryPage.php';
        Head('Teszt');
$rootPath = '/DEMO';
?>
<link rel="stylesheet" type="text/css" href="../css/test.css"/>
<?php
if (!isset($_SESSION['u_id'])) {
    echo 'Csak regisztrált felhasználóknak';
}else{
 ?>
<!--kezdő kérdés-->
<div class="row mx-2">
   <div class="col-12">
        <div class="card text-center" id="startQ">
           
            <div class="card-header">
                 <div class="close index" onclick="CloseToIndex()"></div>
              Öt vagy tíz igéből álló tesztet szeretne? Kattintson a megfelelő gombra
            </div>
            <div class="card-body">
                <a href="#" class="btn" onclick="NumberClick(5)" >5</a>
                <a href="#" class="btn" onclick="NumberClick(10)" >10</a>
            </div>
        
        </div>
   </div>
</div>


<!-- start popup-->
<div class="row mx-2">
   <div class="col-12">
        <div class="card text-center" id="start">
          <div class="card-header">
              <div class="close index" onclick="CloseToIndex()"></div>
              Amikor készen áll kattintson a Start gombbra!
          </div>
          <div class="card-body">

            <a href="#" class="btn" id="start" onclick="StartClick()">Start</a>
          </div>
        </div>
   </div>
</div>

<!-- percent popup-->
<div class="row mx-2">
   <div class="col-12">
        <div class="card text-center percent" >
          <div class="card-header">
              <div class="close index" onclick="ClosetoRefresh()"></div>
              Eredmény
          </div>
          <div class="card-body">
              <div id="text" class="bigger">

                </div>

            <a href="#" class="btn my-3"  onclick="ClosetoRefresh()">OK</a>
          </div>
        </div>
   </div>
</div>
<!-- timer -->
<div class="row mx-2">
   <div class="col-md"></div>
   <div class="col-6 myCenter">
        <div id="timer">
            <span id="remainedTime"></span>
            <span id="minutes"></span> 
            <span id="semicolon"></span>
            <span id="seconds"></span>

        </div>
   </div>
   <div class="col-md"></div>
</div>
<div id="background">
    <div id="test">


    </div>
    <div class="row mx-2">
        <div class="col-md"></div>
            <div class="col-md-4">
                <div class="myCenter" style="margin-top: 15px; margin-bottom: 10px;">
                    <button id="submit" class="btn my-3" type="button" onclick="SubmitButton()">Elküld</button>
                </div>
            </div>
        <div class="col-md"></div>
    </div>
</div>
<?php
}
?>

                            
<?php
require_once '../templates/jquery.php';
?>
<script type="text/javascript" src="../scripts/test.js"></script>
<?php
require_once '../templates/endOfFile.php';
?>