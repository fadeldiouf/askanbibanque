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
     $client= new Client($nom,$prenom,$addresse,$datenaissance,$telephone,$email);
     $clientControle->addClient($client);
 }
$action= isset($_GET['action']) ? $_GET['action'] :NULL;
    if ($action=='suprimer')
        if(isset($_GET['idclient'])){
           $idclient=$_GET['idclient'];
           $clientControle->suprimerClient($idclient);
        header('Location:../views/templates/viewGestionClient/accueilAgent.php');
    
 }
?>