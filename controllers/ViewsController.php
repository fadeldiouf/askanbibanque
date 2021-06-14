<?php
include('../models/ClientControle.php');
$clientcontrole= new ClienControle();

if(isset($_GET['idclient'])) {
    $idclient=$_GET['idclient'];
    $clientcontrole->findByIdclient($idclient);
    
} 
 ?>