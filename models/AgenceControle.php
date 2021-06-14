<?php
require_once('Database.php');
class AgenceControle extends Database{
/*** fonction pour rcuprerer les données */
public function getAgence(){
    $sql = " SELECT a.idagence,nom,prenom,nomagence,a.adresse,datecreation from agence a left JOIN agent g
    ON a.idagence=g.idagence where idagent in  (select u.idagent from user u where  idrole=2)";
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
     header('Location:../views/templates/viewGestionSiege/accueilSiege.php');
      
 }
 public function suprimerAgence($idagence){
     $sql="DELETE FROM agence WHERE idagence=:id";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':id',$idagence,PDO::PARAM_INT);
     $stmt->execute();
     header('Location:../views/templates/viewGestionSiege/accueilSiege.php');
     
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
public function listeOperation(){
    
    $sql="SELECT nom,prenom, num_compte ,o.idagent,idtype,o.idcompte,dateoperation,credit,debite,envoie,recue 
    from client l, operation o,compte c where  l.idclient=c.idclient 
    and o.idcompte=c.idcompte and o.idagent=:idagent  order by dateoperation desc";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute();
    while($resultat=$stmt->fetchAll()){
        return $resultat;
    }
    
}
public function listeOperationAgences(){
    $idagence=$_SESSION['id_agence'];
     $sql="SELECT g.idagence, a.idagent, idoperation,o.idcompte,num_compte,dateoperation,credit,debite,envoie,recue,t.typeoperation from agence g, agent a, operation o,
     compte c ,type t where o.idtype=t.idtype
     and g.idagence=a.idagence and a.idagent=o.idagent and o.idcompte=c.idcompte order by dateoperation desc";
      $stmt=$this->connect()->prepare($sql);
      $stmt->bindValue(':idagence',$idagence,PDO::PARAM_INT);
      $stmt->execute();
      while($resultat=$stmt->fetchAll()){
          return $resultat;
      }
}
}
?>