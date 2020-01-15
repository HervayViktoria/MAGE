<?php
class User extends Database{
	
	private $_firstName;
	private $_lastName;
	private $_userName;
	private $_password;
	private $_email;

	
    public function __construct() {
        
    }
    
    public function setFirstName($fname){
        $this->_firstName = $fname;
    }
    
    public function getFirstName(){
        return $this->_firstName;
    }
    
     public function setLastName($lname){
        $this->_lastName = $lname;
    }
    
    public function getLastName(){
        return $this->_lastName;
    }
    
     public function setUserame($uname){
        $this->_userName = $uname;
    }
    
    public function getUserName(){
        return $this->_userName;
    }
    
     public function setPassword($pass){
        $this->_password = $pass;
    }
    
    public function getPassword(){
        return $this->_password;
    }
    
    public function setEmail($email){
        $this->_email = $email;
    }
    public function getEmail(){
        return $this->_email;
    }
    
    
public function Login($uname, $pwd){
    $this->_userName = $this->RealEscapeString($uname);
    $this->_password = $this->RealEscapeString($pwd);
    
    //error handlers
    //check if inputs are empty
    if (empty($uname) || empty($pwd)) {
        return 'Egyik mező sem lehet üres!';
 
    }else{
	//megnézzük, hogy az email vagy a felhasználónév stimmel-e
	$sql = "SELECT * FROM `users` WHERE user_name='$this->_userName' OR user_email = '$this->_userName';";
	$row = $this->Query($sql);
         if ($row == 0) {
            return 'Helytelen email-cím vagy felhasználónév!';
         }else{
				
            //megnézni, hogy a password passzole...de-hashing the password
             $hashedPwdCheck = password_verify($this->_password, $row[0][5]);
               if ($hashedPwdCheck == false) {
                   return 'Helytelen jelszó!';

               }else if ($hashedPwdCheck == true) {
                   //log in the user at this point
                   $_SESSION['u_id'] = $row[0][0];
                   $_SESSION['u_firstname'] = $row[0][1];
                   $_SESSION['u_lastname'] = $row[0][2];
                   $_SESSION['u_email'] = $row[0][4];
                   $_SESSION['u_name'] = $row[0][3];
                   $_SESSION['type'] = "main";

                   //update the user_lasttime in the DB 
                   $sql = "UPDATE `users` SET `user_lasttime` = NOW() WHERE `user_name` ='$this->_userName' OR user_email = '$this->_userName';";
                   $this->NonQuery($sql);

               }
				
	}
   
        
   } 
   return 1;
}

public function SignUp($first, $last, $uname, $email, $pwd1, $pwd2){
    
    //php metódus ami az injectiont hivatott megakadályozni: mysqli_real_escape_string
    $first1 = $this->RealEscapeString($_POST['first']);
    $last1 = $this->RealEscapeString($_POST['last']); 
    $email1 = $this->RealEscapeString($_POST['email']);                         
    $uname1 = $this->RealEscapeString($_POST['uname']);     
    $pwd1 = $this->RealEscapeString($_POST['pwd1']); 
    $pwd2 = $this->RealEscapeString($_POST['pwd2']);
    $time = (new \DateTime())->format('Y-m-d');
    
    //csupakicsi->fölösleges space eltávolítása->első betű nagy, mert név
     $this->_firstName = ucfirst(trim(mb_strtolower($first1)));
     $this->_lastName = ucfirst(trim(mb_strtolower($last1)));
     $this->_email = trim($email1);
     $this->_userName = trim($uname1);
     $tempPass = trim($pwd1);
     
     if (empty($first) || empty($last) || empty($email) || empty($uname) || empty($tempPass)) {
        return 'Egyik mező sem lehet üres!';
     }else{
         
         //check if email is valid keresi benne a @ karaktert
          if (!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
             return 'Helytelen email-cím!';
          }else{
              $sql = "SELECT * FROM `users` WHERE user_uname='$this->_userName';";
              $result = $this->Query($sql);
               
            //ha talál bármit akkor az a felhasználónév már foglalt
            if ($result != 0) {
            
                return 'Ez a név már foglalt!';           

            }else{
                
                if($pwd1 != $pwd2){
                   return 'A két jelszónak meg kell egyeznie!';
                   
                }else{
                    if (strlen($pwd1)< 5) {
                    
                    return 'A jelszó legyen hosszabb, mint 5 karakter!';
                                           
                    }else{
                        //hashing the password
                        $this->_password = password_hash($tempPass, PASSWORD_DEFAULT);
                        //insert the user into the database
                        $sql = "INSERT INTO `users` (user_firstname, user_lastname, user_name, user_email, user_pass, user_lasttime, user_regtime) VALUES('$this->_firstName', '$this->_lastName','$this->_userName', '$this->_email', '$this->_password', '$time', '$time');";
                        $this->NonQuery($sql);
                    }
                }        
            
            }  

        }
    }
    return 1;
}
    public function DeleteUser($uid){
        $sql = "DELETE FROM `users` WHERE `user_id` = ".$uid.";";
        $this->NonQuery($sql);
    }


}

?>



