<?php
session_start();
require_once('Database.php');
class ClienControle extends Database{
/*** fonction pour rcuprerer les données */
//Utilisation de la fonction
public function getClients(){
    $id_agence=$_SESSION['id_agence'] ;
    $sql = "SELECT * from client l,compte c,user u where l.idclient=c.idclient and l.idclient=u.idclient and
     l.idagent IN (SELECT idagent FROM agent WHERE idagence=:id_agence)";
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
    
        $sql= "INSERT INTO client(idagent,nom,prenom,adresse,datenaissance,telephone,email,genre,cni) 
        VALUES  (:idagent,:nom,:prenom,:addresse,:datenaissance,:telephone,:email,:genre,:cni)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':idagent',$idagent, PDO::PARAM_STR);
        $stmt->bindValue(':nom',$Client->getNom(), PDO::PARAM_STR);
        $stmt->bindValue(':prenom',$Client->getPrenom(), PDO::PARAM_STR);
        $stmt->bindValue(':addresse', $Client->getAddresse(),PDO::PARAM_STR);
        $stmt->bindValue(':datenaissance',$Client->getDatenaissance(), PDO::PARAM_STR);
        $stmt->bindValue(':telephone',$Client->getTelephone(),PDO::PARAM_STR);
        $stmt->bindValue(':email',$Client->getEmail(),PDO::PARAM_STR);
        $stmt->bindValue(':genre',$Client->getGenre(),PDO::PARAM_STR);
        $stmt->bindValue(':cni',$Client->getCni(),PDO::PARAM_STR);
        $stmt->execute();
        $sql5 = "SELECT MAX(idclient) FROM client";
        $stmt5= $this->connect()->prepare($sql5);
        $stmt5->execute();
        $inserted_id= $stmt5->fetchColumn();
        // $inserted_id= $this->connect()->lastInsertId(); 
        $sql1= "INSERT INTO compte(idclient,num_compte,solde,datecreation,type_compte) 
        VALUES  (:idclient,:num_compte,:solde,:datecreation,:typecompte)";
        $stmt2= $this->connect()->prepare($sql1);
        $stmt2->bindValue(':idclient',$inserted_id,PDO::PARAM_INT);
        $stmt2->bindValue(':num_compte',$Compte->genererNumeroCompte(),PDO::PARAM_STR);
        $stmt2->bindValue(':solde',$Compte->getSolde(),PDO::PARAM_INT);
        $stmt2->bindValue(':datecreation',gmdate('d-m-y '),PDO::PARAM_STR);
        $stmt2->bindValue(':typecompte',$Compte->getType_compe(),PDO::PARAM_STR);
        $stmt2->execute();


        $sql4 = "SELECT MAX(idclient) FROM client";
        $stmt4= $this->connect()->prepare($sql4);
        $stmt4->execute();
        $ins_id= $stmt4->fetchColumn();

        $sql2=  "INSERT INTO user (idrole,idclient,username,password)
        VALUES (:idrole,:idclient,:username,:password)";
        $stmt3= $this->connect()->prepare($sql2);
        $stmt3->bindValue(':idrole',$idrole,PDO::PARAM_INT);
        $stmt3->bindValue(':idclient',$ins_id,PDO::PARAM_INT);
        $stmt3->bindValue(':username',$User->getUsername(),PDO::PARAM_STR);
        $stmt3->bindValue(':password',$User->getPasword(),PDO::PARAM_STR);
        $stmt3->execute();


    

 }
 public function suprimerClient($idclient){
     $sql="DELETE FROM client WHERE idclient=:id";
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':id',$idclient,PDO::PARAM_INT);
     $stmt->execute();
    // return $stmt->fetch();
   
     
 }
 public function findByIdclient($id){
    $sql="SELECT * from client l,compte c,user u WHERE   l.idclient=u.idclient and l.idclient=c.idclient and l.idclient=:idclient";
    $stmt= $this->connect()->prepare($sql);
    $stmt->bindValue(':idclient',$id,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
    header('Location:../views/templates/viewGestionClient/accueilAgent.php');
 }
public function modifierClient($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre,$cni,$idclient){
    $sql="UPDATE client SET nom='$nom',prenom='$prenom',adresse='$addresse',datenaissance='$datenaissance',
    telephone='$telephone',email='$email',genre='$genre',cni='$cni' WHERE idclient='$idclient'";
     $stmt=$this->connect()->prepare($sql);
     $stmt->bindValue(':nom',$nom, PDO::PARAM_STR);
     $stmt->bindValue(':prenom',$prenom, PDO::PARAM_STR);
     $stmt->bindValue(':addresse', $addresse,PDO::PARAM_STR);
     $stmt->bindValue(':datenaissance',$datenaissance, PDO::PARAM_STR);
     $stmt->bindValue(':telephone',$telephone,PDO::PARAM_STR);
     $stmt->bindValue(':email',$email,PDO::PARAM_STR);
     $stmt->bindValue(':genre',$genre,PDO::PARAM_STR);
     $stmt->bindValue(':cni',$cni,PDO::PARAM_INT);
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

public function getAllClients(){
    $sql = "SELECT * from client l,compte c,user u where l.idclient=c.idclient and l.idclient=u.idclient ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(); 
    while ($resultat = $stmt->fetchAll()){
        return $resultat;
    }

}
}

?>