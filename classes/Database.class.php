<?php 
class Database extends Tools{
    
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    protected $charset;
    protected $conn;
    
    function __construct(){
        
        
    }
    

    private function OpenConnection(){
        
        $this->serverName = "localhost";
        $this->userName = "root";
        $this->password = "";
        $this->dbName = "mydatabase";
        $this->charset = "utf8";
        
        $this->conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        $this->conn->set_charset($this->charset);
      
        
        if (mysqli_connect_errno()) {
            $_SESSION['error'] = mysqli_connect_error();
            
            header('Location: ../pages/error.php');
        }
          
    }
    
    private function CloseConnection(){
        
        $this->conn->close();
        
    }
        

   
//lekérdezés, ami visszaadja, hány darab ige van az adatbázisban
public function DbLength(){
    $this->OpenConnection();
    $sql = "SELECT COUNT(`verb_id`) FROM `allverbs`;";
    if ($result = $this->conn->query($sql)) {
        if ($result->num_rows) {
            $lenght = $result->fetch_all(MYSQLI_NUM);
                return $lenght[0][0];
                $result->close();
        }else{
            echo 'A lekérdezés nem hozott eredményt!';
        }
    }else{
        echo 'Probléma a lekérdezéssel!';
    }
     mysqli_free_result($result);	    
    $this->CloseConnection();
}

//bármelyik lekérdezéshez használható
//két dimenziós tömbökkel tér vissza ?!
public function Query($sql){
         $this->OpenConnection();
            //van-e hiba a lekérdezésben
            if ($result = $this->conn->query($sql)) {
                //adott-e vissza bármit a lekérdezés
                if ($result->num_rows) {
                   
                while ($row = $result->fetch_all(MYSQLI_NUM)) {
                    return $row;
                 }
                    
                 $result->close();
                }else{
                    //'A lekérdezés nem hozott eredményt!';
                    return 0;
                }
                
            }else{
                //'Probléma a lekérdezéssel!';
                return 0;
            }
            
              
        $this->CloseConnection();
    }


   
 //delete-nek, update-nek, instert into-nak
 public function NonQuery($input){
     $this->OpenConnection();
     $this->conn->query($input);
     $this->CloseConnection();
 }

 public function RealEscapeString($input){
     $this->OpenConnection();
     $result = $this->conn->real_escape_string($input);
     return $result;
 }
 
 

}

?>
