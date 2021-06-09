<?php
include('Database.php');
class Transaction extends Database{

    public function VerificationCompte($num_compte) {
        $sql="SELECT nom,prenom,num_compte,solde FROM client c, compte o WHERE c.idclient=o.idclient 
        AND num_compte=:num_compte";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':num_compte',$num_compte,PDO::PARAM_INT);
        $stmt->execute();
        $resultat=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;

    }
}
?>