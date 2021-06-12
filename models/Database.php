<?php
 class Database{
     private $host = "localhost";
     private $dbname = "askanbibanquedb";
     private $username = "root";
     private $password = "";


     public function connect(){
         $dns = 'mysql:host=' . $this->host .';dbname=' . $this->dbname;
         $con = new PDO($dns, $this->username, $this->password);
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
         return $con;

     }
 }
?>