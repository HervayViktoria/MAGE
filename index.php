<?php 
define('TITLE', 'Index');
 require ('templates/head.php'); 
 require ('templates/menu.php');
 ?>
<div class="row mx-2">
    <div class="col"></div> 
       <div class="card mx-2 col-lg-3" style="padding: 5px;">
            <img class="card-img-top img-fluid" style="border-top-left-radius: 0; border-top-right-radius: 0;" src="img/halanna-halila-NOWBLMI81_g-unsplash.jpg" alt="Card image cap">
            
            <h5 class="card-title" style="text-align: center;">MAGE...</h5>
          <div class="card-body card-block">
              <p class="card-text" style="text-align: justify;">vagyis MAke German Easy!
            Az oldal a régi, jól bevált, papíron megvalósítható tanulási módszereket veszi alapul, és digitális formába varázsolja őket!</p>
          </div>
        </div>
   
        <div class="card mx-2 col-lg-3" style="padding: 5px;">
            <img class="card-img-top img-fluid" style="border-top-left-radius: 0; border-top-right-radius: 0; " src="img/rag.jpg" alt="Card image cap">
            <h5 class="card-title" style="text-align: center;">Igeragozás</h5>
          <div class="card-body card-block">
            <p class="card-text" style="text-align: justify;">A német nyelv kritikus pontja a bonyolult ragozási formák megtanulása. Ezeket a szabályokat számos helyen megtalálni az interneten az alábbi egy példa ezek közül:</p>
            <div class="myCenter">
                <a href="https://webnyelv.hu/nemet-jelen-ido/" class="btn btn-primary">Igeragozás szabályai</a>
            </div>
          </div>
        
        </div>
        
   <div class="card mx-2 col-lg-3" style="padding: 5px;">
       <img class="card-img-top img-fluid" style="border-top-left-radius: 0; border-top-right-radius: 0; " src="img/mult.jpg" alt="Card image cap">
            <h5 class="card-title" style="text-align: center;">Múlt Idő</h5>
          <div class="card-body card-block">
            <p class="card-text" style="text-align: justify;">Az igeragozás mellett az egyszerű és az összetett múlt idővel is meggyülhet a nyelvtanulók baja, íme két összefoglaló a témában:</p>
            <div class="myCenter">
                <a href="https://webnyelv.hu/nemet-mult-ido/" class="btn btn-primary">Egyszerű múlt</a>
                <a href="https://webnyelv.hu/das-perfekt/" class="btn btn-primary">Összetett múlt</a>                
            </div>
          </div>
        
   </div>
   <div class="col"></div> 
   
</div>

<?php




require_once 'templates/jquery.php';

require_once 'templates/endOfFile.php';

?>