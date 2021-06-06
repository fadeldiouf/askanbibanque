<?php
require_once('Database.php');
class AgenceControle extends Database{
/*** fonction pour rcuprerer les données */
public function getAgence(){
    $sql = "SELECT * FROM agence";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    while ($resultat = $stmt->fetchAll()){
        return $resultat;
    }

}
 public function addagence(AGENCE $Agence){
     $sql= "INSERT INTO agence(nomagence,adresse,datecreation) 
     VALUES  (:nomagence,:adresse,:datecreation)";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':nomagence',$Agence->getNomagence(), PDO::PARAM_STR);
     $stmt->bindValue(':adresse',$Agence->getAdresse(), PDO::PARAM_STR);
     $stmt->bindValue(':datecreation',$Agence->getDatecreation(), PDO::PARAM_STR);
     $stmt->execute();
     header('Location:../views/templates/viewGestionAgence/accueilAgence.php');
      
 }
 public function suprimerAgence($idagence){
     $sql="DELETE FROM agence WHERE idagence=:id";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':id',$idagence,PDO::PARAM_INT);
     $stmt->execute();
     return $stmt->fetch();
     header('Location:../views/templates/viewGestionAgence/accueilAgence.php');
     
 }
 public function findByIdclient($idagence){
    $sql="SELECT* FROM agence WHERE idagence=:id";
    $stmt= $this->connect()->prepare($sql);
    $stmt->bindValue(':id',$idagence,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
    header('Location:../views/templates/viewGestionAgence/accueilAgence.php');
 }
public function modifierAgence($nomagence,$adresse,$datecreation,$idagence){
    $sql="UPDATE agence SET (nomagence=:nomagence,adresse=:adresse,datecreation=:datecreation, WHERE idagence=:idagence)";
    $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':nomagence',$nomagence, PDO::PARAM_STR);
     $stmt->bindValue(':adresse', $adresse,PDO::PARAM_STR);
     $stmt->bindValue(':datecreation',$datecreation, PDO::PARAM_STR);
     $stmt->bindValue(':idagence',$idagence,PDO::PARAM_STR);
     $stmt->execute();

}
}

?>