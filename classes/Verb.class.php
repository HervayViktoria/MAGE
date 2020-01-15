<?php
class Verb extends Database{
    //Fields
    private $_infinitive;
    private $_ich;
    private $_du;
    private $_ese;
    private $_wir;
    private $_ihr;
    private $_sie;
    private $_meaning;
    private $_prateritum;
    private $_aux;
    private $_perfekt;
    private $_all = array();
    private $_conjug = array();
    private $_past = array();
    private $count;
    private $_verbArray = array();

    //constructor
    public function __construct() {
        $count = 0;
    }

    public function setInfinitive($inf){
         $this->_infinitive = $this->HandleCharacters($inf);
    }

    public function getInfinitive(){
        return $this->_infinitive;
    }

    public function setIch($ich){
        $this->_ich = $this->HandleCharacters($ich);
    }

    public function getIch(){
        return $this->_ich;
    }

    public function setDu($du){
        $this->_du = $this->HandleCharacters($du);
    }

    public function getDu(){
        return $this->_du;
    }

    public function setEse($ese){
        $this->_ese = $this->HandleCharacters($ese);
    }

    public function getEse(){
        return $this->_ese;
    }

    public function setWir($wir){
        $this->_wir = $this->HandleCharacters($wir);
    }

    public function getWir(){
        return $this->_wir;
    }

    public function setIhr($ihr){
        $this->_ihr = $this->HandleCharacters($ihr);
    }

    public function getIhr(){
        return $this->_ihr;
    }

    public function setSie($sie){
        $this->_sie = $this->HandleCharacters($sie);
    }

    public function getSie(){
        return $this->_sie;
    }

    public function setMeaning($meaning){
        $this->_meaning = $this->HandleCharacters($meaning);
    }

    public function getMeaning(){
        return $this->_meaning;
    }


    public function setPrateritum($prat){
        $this->_prateritum = $this->HandleCharacters($prat);
    }

    public function getPrateritum(){
        return $this->_prateritum;
    }

    public function setAux($aux){
        $this->_aux = $this->HandleCharacters($aux);
    }

    public function getAux(){
        return $this->_aux;
    }

     public function setPerf($perf){
        $this->_perf = $this->HandleCharacters($perf);
    }

    public function getPerf(){
        return $this->_perf;
    }

    public function setAll($inf, $meaning, $ich, $du, $ese, $wir, $ihr, $sie, $prat, $aux, $perf){
        $this->_infinitive = $this->RealEscapeString($this->HandleCharacters($inf));
        $this->_ich = $this->RealEscapeString($this->HandleCharacters($ich));
        $this->_du = $this->RealEscapeString($this->HandleCharacters($du));
        $this->_ese = $this->RealEscapeString($this->HandleCharacters($ese));
        $this->_wir = $this->RealEscapeString($this->HandleCharacters($wir));
        $this->_ihr = $this->RealEscapeString($this->HandleCharacters($ihr));
        $this->_sie = $this->RealEscapeString($this->HandleCharacters($sie));
        $this->_meaning = $this->RealEscapeString($this->HandleCharacters($meaning));
        $this->_prateritum = $this->RealEscapeString($this->HandleCharacters($prat));
        $this->_aux = $this->RealEscapeString($this->HandleCharacters($aux));
        $this->_perfekt = $this->RealEscapeString($this->HandleCharacters($perf));
        array_push($this->_all, $this->_infinitive, $this->_meaning, $this->_ich, $this->_du, $this->_ese, $this->_wir,  $this->_ihr, $this->_sie, $this->_prateritum, $this->_aux, $this->_perfekt);
          
    }

    public function getAll(){
        return $this->_all;
    }

    public function setConjug($ich, $du, $ese, $wir, $ihr, $sie){
        $this->_ich = $this->HandleCharacters($ich);
        $this->_du = $this->HandleCharacters($du);
        $this->_ese = $this->HandleCharacters($ese);
        $this->_wir = $this->HandleCharacters($wir);
        $this->_ihr = $this->HandleCharacters($ihr);
        $this->_sie = $this->HandleCharacters($sie);
        

        array_push($this->_conjug, $this->_ich, $this->_du, $this->_ese, $this->_wir, $this->_ihr, $this->_sie);

    }

    public function getConjug(){
        return $this->_conjug;
    }

    public function setPast($prat, $aux, $perf){
              $this->_prateritum = $this->HandleCharacters($prat);
              $this->_aux = $this->HandleCharacters($aux);
              $this->_perfekt = $this->HandleCharacters($perf);

         array_push($this->_past, $this->_prateritum, $this->_aux, $this->_perfekt);
    }
    
    public function getPast(){
        return $this->_past;
    }
    
     public function setVerbArray($verb, $num){
        array_push($this->_verbArray, $this->HandleCharacters($verb));
        $this->count++;
        if ($this->count === $num) {
            return $this->_verbArray;
        }
    }
    
      public function getVerbArray(){
      return $this->_verbArray;
    }
    
    public function Correction($correctArray, $answerArray){
        $correction = array();
        for ($i = 0; $i < count($correctArray); $i++) {
            if ($correctArray[$i] != $answerArray[$i]) {
                //ha helytelen akkor belekerül a jó válasz
                array_push($correction, $correctArray[$i]);
            }else{
                //ha helyes akkor egy nulla
                array_push($correction, "0");
            }
        }
        return $correction;
    }
    //Ragozás játék
      public function Game1(){
        
        //a ragozós játékhoz  visszaadja egy random ige ragozott alakjait egy számozott tömbben
        $dbLength = $this->DbLength();
        $randomNumber = Tools::RandomNumber($dbLength); 
          $sql = "SELECT `ich`, `du`, `ese`, `wir`, `ihr`, `sie` FROM `allverbs` WHERE `verb_id` ='".$randomNumber."';";
          $table = $this->Query($sql)[0];
           
           $pron = array("ICH", "DU", "ER SIE ES", "WIR", "IHR", "SIE");
     
                //összekeveri a ragozott alakokat
                $ranNum = Tools::RandomNumbers(count($table),6);
             for ($index = 0; $index < count($ranNum); $index++) {
               //az összekevert alakok megjelenítése
                  echo '<div class="row m-2">
                          <div class="col-md"></div>
                          <div class="pron col col-md-4 d-inline-block d-md-block mx-1" data-value="'.$table[$index].'" >'.$pron[$index].'</div>
                          <div class="verb col col-md-4 d-inline-block d-md-block">'.$table[$ranNum[$index]-1].'</div>
                          <div class="col-md"></div>
                        </div>';
             }
    }
    
    //Jelentés játék
    public function Game2(){
         
     //megvan az adatbázis "hossza"
    $dbLength = $this->DbLength();
    //ez alapján vissza tud térni egy tömbbel, amiben 3 random szám lesz ismétlődés nélkül
    $ranNums = Tools::RandomNumbers($dbLength, 3);
    //ebbe a table-be kerül majd a 3 ige magyar és német alakja 
    $verbs = array();
    
    for ($i = 0; $i < count($ranNums); $i++) {
         $sql = "SELECT `hun`, `infinitive` FROM `allverbs` WHERE `verb_id` = '".$ranNums[$i]."';";
         array_push($verbs, $this->Query($sql)[0]);
        
        
    }   

    //megjelenít egy random magyar jelentést
    echo '<div class="row mx-2">
            <div class="col-md"></div>
               <div class="col-md-6 mx-2 myCenter"><div class="myFont" id="randomVerb">'.$verbs[0][0].'</div></div>
            <div class="col-md"></div>  
          </div>';
        
        //összekeveri a 3 igét
        $ranNum2 = Tools::RandomNumbers(count($verbs), 3);
        
        //az összekevert német alakok megjelenítése
        echo '<div class="row mx-2"><div class="col-md"></div><div class="col-md-6 mx-4 d-md-flex" style="justify-content: center;">';
        for ($i = 0; $i < count($ranNum2); $i++) {
           echo '<div class="myCenter"><div class=" myFont meaning mx-1" data-value="'.$verbs[$ranNum2[$i]-1][0].'">'.$verbs[$ranNum2[$i]-1][1].'</div></div>';
       }
       echo '</div><div class="col-md"></div></div>';
    }
    
   
   public function SaveVerbToDB($verbArray, $id, $result = -1){
                     
        if ($result < 0) {
            $insert = true;
            foreach ($verbArray as $item) {
                if (empty($item)) {
                    $insert = false;
                    return 0;
                }
            }
           
            if ($insert == true) {
                //a hozzáadni kívánt ige benne van-e már az adatbázisban
                 $sql1 = "SELECT `user_infinitive` FROM `user_input` WHERE `user_id` = ".$id.";";
                 $table = $this->Query($sql1);
                 if ($table === 0) {
                     
                 }else{
                      for ($i = 0; $i < count($table); $i++) {
                        if ($table[$i][0] === $verbArray[0]) {

                           return 1;
                        }
                    }
                 }
                
        
                      $sql = "INSERT INTO `user_input` (user_id, user_infinitive, user_meaning, user_ich, user_du, user_ese, user_wir, user_ihr, user_sie, user_prat, user_aux, user_perfekt) VALUES('$id','$verbArray[0]','$verbArray[1]', '$verbArray[2]','$verbArray[3]','$verbArray[4]','$verbArray[5]','$verbArray[6]','$verbArray[7]','$verbArray[8]','$verbArray[9]','$verbArray[10]');";
                      $this->NonQuery($sql);
                      return 2;
            }

        }else{
            //Answer input
            $sql = "INSERT INTO `test_answers` (user_id, answer_infinitive, answer_meaning, answer_ich, answer_du, answer_ese, answer_wir, answer_ihr, answer_sie, answer_prat, answer_aux, answer_perfekt, answer_time, result) VALUES ('$id','$verbArray[0]','$verbArray[1]', '$verbArray[2]','$verbArray[3]','$verbArray[4]','$verbArray[5]','$verbArray[6]','$verbArray[7]','$verbArray[8]','$verbArray[9]','$verbArray[10]',NOW(), '$result');";            
            $this->NonQuery($sql);
        }
        
    }
    
    public function UpdateVerbInDB($verbArray, $inputId){

        $sql = "UPDATE `user_input` SET `user_infinitive`='".$verbArray[0]."',`user_meaning`='".$verbArray[1]."',`user_ich`='".$verbArray[2]."',`user_du`='".$verbArray[3]."',`user_ese`='".$verbArray[4]."',`user_wir`='".$verbArray[5]."',`user_ihr`='".$verbArray[6]."',`user_sie`='".$verbArray[7]."',`user_prat`='".$verbArray[8]."',`user_aux`='".$verbArray[9]."',`user_perfekt`='".$verbArray[10]."' WHERE `user_input_id` = ".$inputId.";";
        $this->NonQuery($sql);
    }
    public function DeleteVerbFromDB($inputId){
        $sql = "DELETE FROM `user_input` WHERE `user_input_id` =".$inputId.";";
        $this->NonQuery($sql);
    }
    private function HandleCharacters($input){
       return htmlspecialchars(trim(mb_strtolower($input)));
    }
    
}
?>