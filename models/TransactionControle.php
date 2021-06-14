<?php
include('Database.php');
session_start();
class Transaction extends Database{

    public function VerificationCompte($num_compte) {
        $sql="SELECT nom,prenom, idcompte,num_compte,solde FROM client c, compte o WHERE c.idclient=o.idclient 
        AND num_compte=:num_compte";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':num_compte',$num_compte,PDO::PARAM_INT);
        $stmt->execute();
        $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
        $nom = $resultat['nom'];
        $prenom = $resultat['prenom'];
        $num_compte = $resultat['num_compte'];
        $solde= $resultat['solde'];
        $idcompte=$resultat['idcompte'];
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['num_compte'] = $num_compte;
        $_SESSION['solde'] = $solde;
        $_SESSION['idcompte'] = $idcompte;


        
        return $resultat;

    }
    public function Depot($num_depot,$montant){
        $num_depot=$_SESSION['num_compte'];
        $balance= $_SESSION['solde'];
        $solde=  $balance+ $montant ;
        $sql="UPDATE compte SET solde=:solde WHERE num_compte=:num_compte";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindValue(':solde',$solde);
        $stmt->bindValue(':num_compte',$num_depot);
        $stmt->execute();
        return $stmt;

    }
    public function OperationDepot($credit){
        $idagent=$_SESSION['idAuth'];
        $idtype=1;
        $idcompte=$_SESSION['idcompte'];
        $sql="INSERT INTO operation (idagent,idtype,idcompte,dateoperation,credit) 
        VALUES(:idagent,:idtype,:idcompte,:dateoperation,:credit)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindValue(':idagent',$idagent,PDO::PARAM_INT);
        $stmt->bindValue(':idtype',$idtype,PDO::PARAM_INT);
        $stmt->bindValue(':idcompte',$idcompte,PDO::PARAM_INT);
        $stmt->bindValue(':dateoperation',date('d-m-y h:i:s'),PDO::PARAM_STR);
        $stmt->bindValue(':credit',$credit,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
        
    }
    public function Retrait($num_debite,$montant){
        $num_debite=$_SESSION['num_compte'];
        $balance1= $_SESSION['solde'];
        $solde2=  $balance1- $montant ;
        $sql="UPDATE compte SET solde=:solde WHERE num_compte=:num_compte";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindValue(':solde',$solde2);
        $stmt->bindValue(':num_compte',$num_debite);
        $stmt->execute();
        return $stmt;

    }
    public function OperationRetrait($debite){
        $idagent=$_SESSION['idAuth'];
        $idtype=2;
        $idcompte=$_SESSION['idcompte'];
        $sql="INSERT INTO operation (idagent,idtype,idcompte,dateoperation,debite) 
        VALUES(:idagent,:idtype,:idcompte,:dateoperation,:debite)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindValue(':idagent',$idagent,PDO::PARAM_INT);
        $stmt->bindValue(':idtype',$idtype,PDO::PARAM_INT);
        $stmt->bindValue(':idcompte',$idcompte,PDO::PARAM_INT);
        $stmt->bindValue(':dateoperation',date('d-m-y h:i:s'),PDO::PARAM_STR);
        $stmt->bindValue(':debite',$debite,PDO::PARAM_STR);
        $stmt->execute();
    }
    public function Virement($num_envoie_vir,$num_recue_vir,$montant){
        $num_envoie_vir=$_SESSION['num_compte'];
        $num_recue_vir=$_SESSION['num_compte1'];
        $balance2= $_SESSION['solde'];
        $solde3=  $balance2- $montant;
        $balance3= $_SESSION['solde1'];
        $solde4=  $balance3+$montant ;
       
        $sql="UPDATE compte SET solde=:solde WHERE num_compte=:num_compte";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindValue(':solde',$solde3);
        $stmt->bindValue(':num_compte',$num_envoie_vir);
        $stmt->execute();
        
        $sql1="UPDATE compte SET solde=:solde1 WHERE num_compte=:num_compte1";
        $stmt1=$this->connect()->prepare($sql1);
        $stmt1->bindValue(':solde1',$solde4);
        $stmt1->bindValue(':num_compte1',$num_recue_vir);
        $stmt1->execute();

        
    }
    public function VerificationCompte1($num_compte1) {
        $sql="SELECT nom,prenom, idcompte,num_compte,solde FROM client c, compte o WHERE c.idclient=o.idclient 
        AND num_compte=:num_compte";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':num_compte',$num_compte1,PDO::PARAM_INT);
        $stmt->execute();
        $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
        $nom1 = $resultat['nom'];
        $prenom1 = $resultat['prenom'];
        $num_compte1 = $resultat['num_compte'];
        $solde1= $resultat['solde'];
        $idcompte1=$resultat['idcompte'];
        $_SESSION['nom1'] = $nom1;
        $_SESSION['prenom1'] = $prenom1;
        $_SESSION['num_compte1'] = $num_compte1;
        $_SESSION['solde1'] = $solde1;
        $_SESSION['idcompte1'] = $idcompte1;

        return $resultat;
        }
    public function OperationVirement_envoie($envoie){
            $idagent=$_SESSION['idAuth'];
            $idtype=3;
            $idcompte=$_SESSION['idcompte'];
            $sql="INSERT INTO operation (idagent,idtype,idcompte,dateoperation,envoie) 
            VALUES(:idagent,:idtype,:idcompte,:dateoperation,:envoie)";
            $stmt=$this->connect()->prepare($sql);
            $stmt->bindValue(':idagent',$idagent,PDO::PARAM_INT);
            $stmt->bindValue(':idtype',$idtype,PDO::PARAM_INT);
            $stmt->bindValue(':idcompte',$idcompte,PDO::PARAM_INT);
            $stmt->bindValue(':dateoperation',date('d-m-y h:i:s'),PDO::PARAM_STR);
            $stmt->bindValue(':envoie',$envoie,PDO::PARAM_STR);
            $stmt->execute();
        }
    public function OperationVirement_recue($recue){
        $idagent=$_SESSION['idAuth'];
        $idtype=3;
        $idcompte1=$_SESSION['idcompte1'];
        $sql="INSERT INTO operation (idagent,idtype,idcompte,dateoperation,recue) 
        VALUES(:idagent,:idtype,:idcompte,:dateoperation,:envoie)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindValue(':idagent',$idagent,PDO::PARAM_INT);
        $stmt->bindValue(':idtype',$idtype,PDO::PARAM_INT);
        $stmt->bindValue(':idcompte',$idcompte1,PDO::PARAM_INT);
        $stmt->bindValue(':dateoperation',gmdate('d-m-y h:i:s'),PDO::PARAM_STR);
        $stmt->bindValue(':envoie',$recue,PDO::PARAM_STR);
        $stmt->execute();
    }   
    
    public function listeOperation(){
        $idagent=$_SESSION['idAuth'];
         $sql="SELECT idoperation,o.idcompte,num_compte,dateoperation,credit,debite,envoie,recue,t.typeoperation from operation o, 
         compte c ,type t where o.idtype=t.idtype
         and o.idcompte=c.idcompte and  idagent=:idagent order by dateoperation desc";
          $stmt=$this->connect()->prepare($sql);
          $stmt->bindValue(':idagent',$idagent,PDO::PARAM_INT);
          $stmt->execute();
          while($resultat=$stmt->fetchAll()){
              return $resultat;
          }
    }
    public function listeOperationAgence(){
        $idagence=$_SESSION['id_agence'];
         $sql="SELECT a.idagent,idoperation,o.idcompte,num_compte,dateoperation,credit,debite,envoie,recue,t.typeoperation from agent a, operation o,
         compte c,type t where o.idtype=t.idtype
         and a.idagent=o.idagent and o.idcompte=c.idcompte and  idagence=:idagence order by dateoperation desc";
          $stmt=$this->connect()->prepare($sql);
          $stmt->bindValue(':idagence',$idagence,PDO::PARAM_INT);
          $stmt->execute();
          while($resultat=$stmt->fetchAll()){
              return $resultat;
          }
    }
 }

?>