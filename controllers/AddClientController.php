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
     $genre=$_POST['genre'];
     $civilite=$_POST['civilite'];
     $client= new Client($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$civilite);
     $clientControle->addClient($client);
 }
$action= isset($_GET['action']) ? $_GET['action'] :NULL;
    if ($action=='suprimer')
        if(isset($_GET['idclient'])){
           $idclient=$_GET['idclient'];
           $clientControle->suprimerClient($idclient);
<<<<<<< HEAD
        header('Location:../views/templates/viewGestionClient/accueilAgent.php');    
       }   
 $update=isset($_GET['update']) ? $_GET['update'] :NULL;   
   if ($update='modifiactin'&& isset($_GET['idclient'])){
    $clientControle->findByIdclient($_GET['idclient']);
   }
   else if ($update='modifier'){
       extract($_POST);
    $clientControle->modifierClient($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$civilite,$idclient);
    header('Location:../views/templates/viewGestionClient/accueilAgent.php');
=======
        header('Location:../views/templates/viewGestionClient/accueilAgent.php');
    
>>>>>>> e4a9bdaff8f8ff97b8cb4e449c09b44819d6a6fa
 }
    

?>