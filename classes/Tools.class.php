<?php
class Tools{
    //visszatér x hosszúságú tömbbel, amiben random számok vannak ismétlődés nélkül
    public static function RandomNumbers($inputLength, $returnLength){
       $myarray = array();
       $max = $inputLength;
       $szam = rand(1,$max);
       array_push($myarray, $szam);
       $megy = true;
       while ($megy) {

           $szam1 = rand(1, $max);
           $szamol = 0;
          for($j = 0; $j<count($myarray); $j++){

              if ($szam1 == $myarray[$j]) {
                  $szamol++;
              }
          }

          if ($szamol == 0) {
              array_push($myarray, $szam1);
          }else{
              $megy = true;
          }

          if (count($myarray) == $returnLength) {
              $megy = false;
              break;
          }
       }
       

       return $myarray;
  }
  
  //visszatér egy darab random számmal
public static  function RandomNumber($input){
       $max = $input;
       $szam = rand(1, $max);
       return $szam;
   } 
}

