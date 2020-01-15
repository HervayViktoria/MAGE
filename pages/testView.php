<?php
require_once '../templates/headOfEveryPage.php';
Head('Teszteredmény');
require_once '../includes/testView.inc.php';

?>
<div class="row mx-2">
   <div class="col-md"></div>
   <div class="col-md-6">
        <div class="myCenter bigger">Százalék: <?php echo $result[0][0];?></div>
   </div>
   <div class="col-md"></div>
</div>


<?php GeneratePage(); ?>



<?php 
require_once '../templates/jquery.php';
?>

<?php
require_once '../templates/endOfFile.php';
?>