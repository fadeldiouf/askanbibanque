<?php
include('../models/UserControle.php');
$userControler =new UserControle();

if(isset($_POST['cnx'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($userControler->authentification($username,$password)){
         if( $_SESSION['roleAuth']=='superadmin') {
            header('Location:../views/templates /viewGestionAgence/accueilSiege.php');
            }
        else if( $_SESSION['roleAuth']=='admin') {
<<<<<<< HEAD
            header('Location:../views/templates/viewGestionAgence/AccueilAgence.php');
=======
            header('Location:../views/templates/viewGestionUser/AcceilAgence.php');
>>>>>>> 0e5a3e06f05cd806f0a543c39937c519f0cfb4de
           }
        else if ( $_SESSION['roleAuth']=='agent') {
            header('Location:../views/templates/viewGestionClient/accueilAgent.php');
         }
    }
    else
     {
         header('Location:../views/templates/login.php');
    } 
}

?>