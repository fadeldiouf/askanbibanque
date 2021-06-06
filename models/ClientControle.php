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
     session_start();
     $idagent=$_SESSION['idAuth'];
     $sql= "INSERT INTO client(idagent,nom,prenom,adresse,datenaissance,telephone,email,genre,civilite) 
     VALUES  (:idagent,:nom,:prenom,:addresse,:datenaissance,:telephone,:email,:genre,:civilite)";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':idagent',$idagent, PDO::PARAM_STR);
     $stmt->bindValue(':nom',$Client->getNom(), PDO::PARAM_STR);
     $stmt->bindValue(':prenom',$Client->getPrenom(), PDO::PARAM_STR);
     $stmt->bindValue(':addresse', $Client->getAddresse(),PDO::PARAM_STR);
     $stmt->bindValue(':datenaissance',$Client->getDatenaissance(), PDO::PARAM_STR);
     $stmt->bindValue(':telephone',$Client->getTelephone(),PDO::PARAM_STR);
     $stmt->bindValue(':email',$Client->getEmail(),PDO::PARAM_STR);
     $stmt->bindValue(':genre',$Client->getGenre(),PDO::PARAM_STR);
     $stmt->bindValue(':civilite',$Client->getCivilte(),PDO::PARAM_STR);
     $stmt->execute();
     header('Location:../views/templates/viewGestionClient/accueilAgent.php');
      
 }
 public function suprimerClient($idclient){
     $sql="DELETE FROM client WHERE idclient=:id";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':id',$idclient,PDO::PARAM_INT);
     $stmt->execute();
     return $stmt->fetch();
     header('Location:../views/templates/viewGestionClient/accueilAgent.php');
     
 }
 public function findByIdclient($idclient){
    $sql="SELECT* FROM client WHERE idclient=:id";
    $stmt= $this->connect()->prepare($sql);
    $stmt->bindValue(':id',$idclient,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
    header('Location:../views/templates/viewGestionClient/accueilAgent.php');
 }
public function modifierClient($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$civilite,$idclient){
    $sql="UPDATE client SET (nom=:nom,prenom=:prenom,addresse=:addresse,datenaissance=:datenaissance,
    telephone=:telephone,email=:email,genre=:genre,civile=:genre WHERE idclient=:idclient)";
    $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':nom',$nom, PDO::PARAM_STR);
     $stmt->bindValue(':prenom',$prenom, PDO::PARAM_STR);
     $stmt->bindValue(':addresse', $addresse,PDO::PARAM_STR);
     $stmt->bindValue(':datenaissance',$datenaissance, PDO::PARAM_STR);
     $stmt->bindValue(':telephone',$telephone,PDO::PARAM_STR);
     $stmt->bindValue(':email',$email,PDO::PARAM_STR);
     $stmt->bindValue(':genre',$genre(),PDO::PARAM_STR);
     $stmt->bindValue(':civilite',$civilite->getCivilte(),PDO::PARAM_STR);
     $stmt->bindValue(':idclient',$idclient,PDO::PARAM_STR);
     $stmt->execute();

}
}

?>