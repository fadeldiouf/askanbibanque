<?php
 include('../models/ClientModel.php');
 include('../models/ClientControle.php');
 include('../models/CompteModel.php');
 include('../models/UserModel.php');

 $clientControle= new ClienControle();
 if (isset($_POST['verification'])){
    $num_compte=$_POST['num_compte'];
   $verify = $clientControle->VerificationCompte($num_compte);
   if ($verify){
    header('Location:../views/templates/viewGestionClient/depot.php');
    }
}
 if (isset($_POST['add'])){
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $addresse=$_POST['addresse'];
     $datenaissance=$_POST['datenaiss'];
     $telephone=$_POST['telephone'];
     $email=$_POST['email'];
     $genre=$_POST['genre'];
     $solde=$_POST['solde'];
     $datecreation=$_POST['datecreation'];
     $typecompte=$_POST['typecompte'];
     $username=$_POST['username'];
     $password=$_POST['password'];

     $client= new Client($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre);
     $compte= new Compte($solde,$datecreation,$typecompte);
     $user= new User($username,$password);
     $clientControle->addClient($client,$compte,$user);
     header('Location:../views/templates/viewGestionClient/accueilAgent.php');
 }

$action= isset($_GET['action']) ? $_GET['action'] :NULL;
    if ($action=='suprimer')
        if(isset($_GET['idclient'])){
           $idclient=$_GET['idclient'];
           $clientControle->suprimerClient($idclient);
        header('Location:../views/templates/viewGestionClient/accueilAgent.php');    
       }    
 $update=isset($_GET['update']) ? $_GET['update'] :NULL;   
   if ($update='modifiactin'&& isset($_GET['idclient'])){
    $clientControle->findByIdclient($_GET['idclient']);
   }
   else if ($update='modifier'){
       extract($_POST);
    $clientControle->modifierClient($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$idclient,);
    header('Location:../views/templates/viewGestionClient/accueilAgent.php');

 }

else{
    echo "<div class='alert alert-success w-50 mx-auto'>Numero Compte. $_POST[num_compte] N'existe pas</div>";
}
?>