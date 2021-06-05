<?php
 include('../models/ClientModel.php');
 include('../models/ClientControle.php');

 $clientControle= new ClienControle();
 if (isset($_POST['add'])){
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $addresse=$_POST['addresse'];
     $datenaissance=$_POST['datenaissance'];
     $telephone=$_POST['telephone'];
     $email=$_POST['email'];
     $username=$_POST['username'];
     $password=$_POST['password'];


     $client= new Client($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$username,$password);
     $clientControle->addClient($client);
 }
?>