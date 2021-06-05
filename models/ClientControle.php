<?php
require_once('Database.php');
class ClienControle extends Database{
/*** fonction pour rcuprerer les données */
public function getClients(){
    $sql = "SELECT * FROM client";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    while ($resultat = $stmt->fetchAll()){
        return $resultat;
    }

}
 public function addClient(Client $Client){
     $sql= "INSERT INTO client(nom,prenom,adresse,datenaissance,telephone,email,username,password) 
     VALUES  (:nom,:prenom,:addresse,:datenaissance,:telephone,:email,:username,:password)";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':nom',$Client->getNom(), PDO::PARAM_STR);
     $stmt->bindValue(':prenom',$Client->getPrenom(), PDO::PARAM_STR);
     $stmt->bindValue(':addresse', $Client->getAddresse(),PDO::PARAM_STR);
     $stmt->bindValue(':datenaissance',$Client->getDatenaissance(), PDO::PARAM_STR);
     $stmt->bindValue(':telephone',$Client->getTelephone(),PDO::PARAM_STR);
     $stmt->bindValue(':email',$Client->getEmail(),PDO::PARAM_STR);
     $stmt->bindValue(':username',$Client->getUsername(),PDO::PARAM_STR);
     $stmt->bindValue(':password',$Client->getPassword(),PDO::PARAM_STR);
     $stmt->execute();
     header('Location:../views/templates/viewGestionClient/accueilAgent.php');
      
 }
}

?>