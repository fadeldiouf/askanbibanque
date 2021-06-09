<?php 
include('../models/TransactionControle.php');
$transactionController= new Transaction();
if (isset($_POST['verification'])){
    $num_compte=$_POST['num_compte'];
   $verify = $transactionController->VerificationCompte($num_compte);
   if ($verify){
    header('Location:../views/templates/viewGestionClient/depot.php');
    }
    else{
        echo "<div class='alert alert-success w-50 mx-auto'>Numero Compte. $_POST[num_compte] N'existe pas</div>";
    }
}
?>