<?php
include('../models/UserControle.php');
$userControler =new UserControle();

if(isset($_POST['cnx'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($userControler->authentification($username,$password)){
         if( $_SESSION['roleAuth']=='superadmin') {
            header('Location:../views/templates/viewGestionAgence/AjouterAgence.php');
            }
        else if( $_SESSION['roleAuth']=='admin') {
            header('Location:../views/templates/viewGestionUser/AjouterAgent.php');
           }
        else if ( $_SESSION['roleAuth']=='agent') {
            header('Location:../views/templates/viewGestionClient/accueilAgent.php');
         }
    }
    else
     {
         header('Location:../views/templates/viewGestionClient/login.php');
    } 
}

?>