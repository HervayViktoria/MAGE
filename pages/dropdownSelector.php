<?php 

require_once '../templates/headOfEveryPage.php';
        Head('Igefajták');

?>
<form action="conjugation.php" method="POST">
<div class="card text-center" id="selectList">
  <div class="card-header">
    Melyik igékkel szeretne gyakorolni?
  </div>
  <div class="card-body">
      <button class="btn my-1" data-value="main" onclick="DropDownSelector('main')">Összes ige</button>
      <button class="btn my-1" data-value="own" onclick="DropDownSelector('own')">Saját igék</button>
      <button class="btn my-1" data-value="modalverb" onclick="DropDownSelector('modalverb')">Módbeli segédigék</button>
      <button class="btn my-1" data-value="reflexive" onclick="DropDownSelector('reflexive')">Visszaható igék</button>
      <button class="btn my-1" data-value="simple" onclick="DropDownSelector('simple')">Egyszerű igék</button>

  </div>
</div>


</form>


<?php require_once '../templates/jquery.php'; ?>

<?php
require_once '../templates/endOfFile.php';
?>