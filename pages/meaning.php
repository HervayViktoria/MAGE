<?php
    require_once '../templates/headOfEveryPage.php';
    require_once '../includes/meaning.inc.php';
        Head('Jelentés');
?>
<link rel="stylesheet" type="text/css" href="../css/correction.css"/>
<div class="myBorder" style="margin-left: 0.25rem; margin-right: 0.25rem; padding-left: 25px; padding-right: 25px;">

  <div class="row my-2 py-3">
      <div class="col">
      </div>   
      
      <div class="col-4 d-none d-md-block">
          <div class="myCenter">
             <h5> Magyar</h5>
          </div>
      </div>
      
      <div class="col-4 d-none d-md-block">
          <div class="myCenter">
            <h5>Német</h5>
          </div>
      </div>     
      
      <div class="col">
      </div>  
  </div>
  
    <?php
            Table();
    ?>
    

<!-- Gombok -->
        <!-- sm buttons -->
    <div class="row my-2 d-md-none">
        <div class="col myCenter my-2">
            <input type="submit" class="btn" onclick="ClickonMeaning()" value="Ellenőrzés"/>
        </div>
        <div class="col-md-8">
        </div>
        <div class="col myCenter my-2">
            <input type="submit" class="btn" onclick="Refresh()" value="Új igéket kérek"/>
        </div>
    
    </div>
        
        <!-- md/lg buttons -->
        <div class="row my-2 d-none d-md-flex">
            <div class="col">
            </div>
            
            <div class="col-md-4 my-2">
                <div class="myCenter">
                     <input type="submit" class="btn" onclick="ClickonMeaning()" value="Ellenőrzés"/>
                </div>
            </div>
            
            <div class="col-md-4 my-2">
                <div class="myCenter">
                    <input type="submit" class="btn" onclick="Refresh()" value="Új igéket kérek"/>
                </div>
            </div>
            
            <div class="col">
            </div>
        </div>


</div>
<?php 
require_once '../templates/jquery.php';?>

<?php
require_once '../templates/endOfFile.php';
?>