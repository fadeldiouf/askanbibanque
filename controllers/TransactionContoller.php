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
if (isset($_POST['verification1'])){
    $num_compte=$_POST['num_compte'];
    $verify = $transactionController->VerificationCompte($num_compte);
   if ($verify){
    header('Location:../views/templates/viewGestionClient/retrait.php'); 
    }
    else{
        echo "<div class='alert alert-success w-50 mx-auto'>Numero Compte. $_POST[num_compte] N'existe pas</div>";
    }
    
}
if (isset($_POST['verification2'])){
    $num_compte=$_POST['num_compte'];
    $verify = $transactionController->VerificationCompte($num_compte);
   if ($verify){
    header('Location:../views/templates/viewGestionClient/virement.php'); 
    }
    else{
        echo "<div class='alert alert-success w-50 mx-auto'>Numero Compte. $_POST[num_compte] N'existe pas</div>";
    }
    
}
if(isset($_POST['depot'])){
    $num_depot=$_POST['num_compte'];
    $montant=$_POST['montant'];
    $credit=$_POST['montant'];
    $transactionController->Depot($num_depot,$montant);
    $transactionController->OperationDepot($credit);
    header('Location:../fpdf/facture_depot.php');   


}
if(isset($_POST['retrait'])){
    $num_debite=$_POST['num_compte'];
    $montant=$_POST['montant'];
    $debite=$_POST['montant'];
    $transactionController->Retrait($num_debite,$montant);
    $transactionController->OperationRetrait($debite);
    header('Location:../fpdf/facture_retrait.php');   


}
if(isset($_POST['virement'])){
    $num_envoie_vir=$_POST['num_compte1'];
    $num_recue_vir=$_POST['num_compte2'];
    $montant=$_POST['montant'];
    $envoie=$_POST['montant'];
    $recue=$_POST['montant'];
    $transactionController->Virement($num_envoie_vir,$num_recue_vir,$montant);
    $transactionController->OperationVirement_envoie($envoie);
    $transactionController->OperationVirement_recue($recue);
    header('Location:../views/templates/viewGestionClient/accueilAgent.php');   


}
$transactionController= new Transaction();
if (isset($_POST['verification3'])){
    $num_compte=$_POST['num_compte'];
    $verify = $transactionController->VerificationCompte($num_compte);
   if ($verify){
    header('Location:../views/templates/viewGestionClient/verifcationCompte2.php'); 
    }
    else{
        echo "<div class='alert alert-success w-50 mx-auto'>Numero Compte. $_POST[num_compte] N'existe pas</div>";
    }
}
if (isset($_POST['verification4'])){
    $num_compte1=$_POST['num_compte1'];
    $verify = $transactionController->VerificationCompte1($num_compte1);
   if ($verify){
    header('Location:../views/templates/viewGestionClient/virement.php'); 
    }
    else{
        echo "<div class='alert alert-success w-50 mx-auto'>Numero Compte. $_POST[num_compte1] N'existe pas</div>";
    }
}
?>