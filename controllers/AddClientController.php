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
     $email=$_POST['mail'];
     $genre=$_POST['genre'];
     $cni=$_POST['cni'];
     $solde=$_POST['solde'];
     $typecompte=$_POST['typecompte'];
     $username=$_POST['username'];
     $password=$_POST['password'];
     

     $client= new Client($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$cni);
     $compte= new Compte($solde,$datecreation,$typecompte);
     $user= new User($username,$password);
     $clientControle->addClient($client,$compte,$user);
     header('Location:../views/templates/viewGestionClient/accueilAgent.php');
 }


    
    if(isset($_GET['idclient'])){
           $idclient=$_GET['idclient'];
           $clientControle->suprimerClient($idclient);
       header('Location:../views/templates/viewGestionClient/accueilAgent.php');    
       }    
    if(isset($_GET['id'])) {
        $idclient=$_GET['idclient'];
        $clientControle->findByIdclient($_GET['idclient']);
        header('Location:../views/templates/viewGestionClient/accueilSiege.php');
    } 
      
   if (isset($_POST['update'])){
        $idclient=$_POST['idclient'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $addresse=$_POST['addresse'];
        $datenaissance=$_POST['datenaissance'];
        $telephone=$_POST['telephone'];
        $email=$_POST['email'];
        $genre=$_POST['genre'];
        $cni=$_POST['cni'];
       
    $clientControle->modifierClient($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$cni,$idclient);
    header('Location:../views/templates/viewGestionClient/accueilAgent.php');

 }

?>