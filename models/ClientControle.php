<?php
session_start();
require_once('Database.php');
class ClienControle extends Database{
/*** fonction pour rcuprerer les données */
//Utilisation de la fonction
public function getClients(){
    $id_agence=$_SESSION['id_agence'] ;
    $sql = "SELECT * from client WHERE idagent IN (SELECT idagent FROM agent WHERE idagence=:id_agence)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':id_agence',$id_agence, PDO::PARAM_STR);
    $stmt->execute();
    while ($resultat = $stmt->fetchAll()){
        return $resultat;
    }

}
 public function addClient(Client $Client,Compte $Compte,User $User){
     $idagent=$_SESSION['idAuth'];
     $idrole=4;
    
        $sql= "INSERT INTO client(idagent,nom,prenom,adresse,datenaissance,telephone,email,genre) 
        VALUES  (:idagent,:nom,:prenom,:addresse,:datenaissance,:telephone,:email,:genre)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':idagent',$idagent, PDO::PARAM_STR);
        $stmt->bindValue(':nom',$Client->getNom(), PDO::PARAM_STR);
        $stmt->bindValue(':prenom',$Client->getPrenom(), PDO::PARAM_STR);
        $stmt->bindValue(':addresse', $Client->getAddresse(),PDO::PARAM_STR);
        $stmt->bindValue(':datenaissance',$Client->getDatenaissance(), PDO::PARAM_STR);
        $stmt->bindValue(':telephone',$Client->getTelephone(),PDO::PARAM_STR);
        $stmt->bindValue(':email',$Client->getEmail,PDO::PARAM_STR);
        $stmt->bindValue(':genre',$Client->getGenre(),PDO::PARAM_STR);
        $stmt->execute();
        $inserted_id= $this->connect()->lastInsertId(); 
        $sql1= "INSERT INTO compte(idclient,num_compte,solde,datecreation,type_compte) 
        VALUES  (:idclient,:num_compte,:solde,:datecreation,:typecompte)";
        $stmt= $this->connect()->prepare($sql1);
        $stmt->bindValue(':idclient',$inserted_id,PDO::PARAM_INT);
        $stmt->bindValue(':num_compte',$Compte->genererNumeroCompte(),PDO::PARAM_STR);
        $stmt->bindValue(':solde',$Compte->getSolde(),PDO::PARAM_INT);
        $stmt->bindValue(':datecreation',$Compte->getDatecreation(),PDO::PARAM_STR);
        $stmt->bindValue(':typecompte',$Compte->getType_compe(),PDO::PARAM_STR);
        $stmt->execute();
        $sql2=  "INSERT INTO user (idrole,idclient,username,password)
        VALUES (:idrole,:idclient,:username,:password)";
        $stmt= $this->connect()->prepare($sql2);
        $stmt->bindValue(':idrole',$idrole,PDO::PARAM_INT);
        $stmt->bindValue(':idclient',$inserted_id,PDO::PARAM_INT);
        $stmt->bindValue(':username',$User->getUsername(),PDO::PARAM_STR);
        $stmt->bindValue(':password',$User->getPasword(),PDO::PARAM_STR);
        $stmt->execute();


    

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
public function modifierClient($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$idclient){
    $sql="UPDATE client SET (nom=:nom,prenom=:prenom,addresse=:addresse,datenaissance=:datenaissance,
    telephone=:telephone,email=:email,genre=:genre WHERE idclient=:idclient)";
    $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':nom',$nom, PDO::PARAM_STR);
     $stmt->bindValue(':prenom',$prenom, PDO::PARAM_STR);
     $stmt->bindValue(':addresse', $addresse,PDO::PARAM_STR);
     $stmt->bindValue(':datenaissance',$datenaissance, PDO::PARAM_STR);
     $stmt->bindValue(':telephone',$telephone,PDO::PARAM_STR);
     $stmt->bindValue(':email',$email,PDO::PARAM_STR);
     $stmt->bindValue(':genre',$genre(),PDO::PARAM_STR);
     $stmt->bindValue(':idclient',$idclient,PDO::PARAM_STR);
     $stmt->execute();

}
public function VerificationCompte($num_compte) {
    $sql="SELECT nom,prenom,num_compte,solde FROM client c, compte o WHERE c.idclient=o.idclient 
    AND num_compte=:num_compte";
    $stmt= $this->connect()->prepare($sql);
    $stmt->bindValue(':num_compte',$num_compte,PDO::PARAM_INT);
    $stmt->execute();
    $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
    if($resultat){
        return $resultat;
    }
    

}
}

?>