<?php
 include('../models/AgenceModel.php');
 include('../models/AgenceControle.php');

 $agenceControle= new AgenceControle();
 if (isset($_POST['add'])){
     $nomagence=$_POST['nomagence'];
     $adresse=$_POST['adresse'];
     $datecreation=$_POST['datecreation'];
     $agence= new Agence($nomagence,$adresse,$datecreation);
     $agenceControle->addAgence($agence);
 }
$action= isset($_GET['action']) ? $_GET['action'] :NULL;
    if ($action=='suprimer')
        if(isset($_GET['idagence'])){
           $idagence=$_GET['idagence'];
           $agenceControle->suprimerAgence($idagence);
        header('Location:../views/templates/viewGestionSiege/accueilSiege.php');
       
 }

 if (isset($_POST['designe'])){
    $idagence=$_POST['idagence'];
     $idagent=$_POST['id'];
     $agenceControle->designeAdmin($idagence,$idagent);
     header('Location:../views/templates/viewGestionSiege/accueilSiege.php');

 }

?>