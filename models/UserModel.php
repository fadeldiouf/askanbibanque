<?php
class User{
    private $username;
    private $password;
    function  __construct($username,$password){
       
        $this->username = $username;
        $this->$password = $password;

    }
     /*** getters */
    public function getUsername(){
        return $this->username;
    }
    public function getPasword(){
        return $this->password;
    }
   
    /*** setters */
    public function setUsername($username){
        $this->$username = $username;
    }   
    public function setPassword($password){
        $this->password = $password;
    }

}

?>