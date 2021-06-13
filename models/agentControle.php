<?php 
session_start();
include('Database.php');
class AgentControle extends Database{
	/**
	 * fonction pour recuperer tous les enregistrements de user
	 **/
	public function getagent(){
        $id_agence=$_SESSION['id_agence'];
		$sql="SELECT * FROM agent,user    WHERE  user.idagent=agent.idagent and  idagence=:id_agence group by agent.idagent desc ";
		$stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':id_agence',$id_agence, PDO::PARAM_STR);
		$stmt->execute();
		while ($result = $stmt->fetchAll()) {
			return $result;
		}
	}


    /* fonction pour inserer les users a la base de donnée
    **/
   public function addAgent(Agent $agent,User $User){

    $idagence=$_SESSION['id_agence'];
    $idrole=2;

       $sql="INSERT INTO agent(Idagence,nom,prenom,adresse,datenaissance,telephone,email,genre,civilite) VALUES(:idagence,:nom,:prenom,:Adresse,:DateNaissance,:Telephone,:Email,:genre,:Civ)";
       $stmt= $this->connect()->prepare($sql);
       $stmt->bindValue(':idagence', $idagence, PDO::PARAM_STR);
       $stmt->bindValue(':nom', $agent->getNom(), PDO::PARAM_STR);
       $stmt->bindValue(':prenom', $agent->getPrenom(), PDO::PARAM_STR);
       $stmt->bindValue(':Adresse', $agent->getAdresse(), PDO::PARAM_STR);
       $stmt->bindValue(':DateNaissance', $agent->getDateNaissance(), PDO::PARAM_STR);
       $stmt->bindValue(':Telephone', $agent->getTelephone(), PDO::PARAM_STR);
       $stmt->bindValue(':Email', $agent->getEmail(), PDO::PARAM_STR);
       $stmt->bindValue(':genre', $agent->getgenre(), PDO::PARAM_STR);
       $stmt->bindValue(':Civ', $agent->getCivilite(), PDO::PARAM_STR);
       $stmt->execute();


       $sql4 = "SELECT MAX(idagent) FROM agent";
       $stmt4= $this->connect()->prepare($sql4);
       $stmt4->execute();
       $ins_id= $stmt4->fetchColumn();


       $sql2=  "INSERT INTO user (idrole,idagent,username,password)
        VALUES (:idrole,:idagent,:username,:password)";
        $stmt3= $this->connect()->prepare($sql2);
        $stmt3->bindValue(':idrole',$idrole,PDO::PARAM_INT);
        $stmt3->bindValue(':idagent',$ins_id,PDO::PARAM_INT);
        $stmt3->bindValue(':username',$User->getUsername(),PDO::PARAM_STR);
        $stmt3->bindValue(':password',$User->getPasword(),PDO::PARAM_STR);
        $stmt3->execute();


       header("location: {$_SERVER['HTTP_REFERER']}");
   }


   public function authentication($login,$password){
    $sql="SELECT login,pass FROM agent  WHERE  login=:login AND pass=:password";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
       $resultat = $stmt->fetch(PDO::FETCH_ASSOC); 
      
           
        return $resultat;
}



public function updateagent($nom,$prenom,$Adresse,$DateNaissance,$Telephone,$Email,$genre,$Civ,$username,$motpasse,$idagent)
{

    $sql="UPDATE  agent SET nom='$nom',prenom='$prenom',adresse='$Adresse',datenaissance='$DateNaissance',
    telephone='$Telephone',email='$Email',genre='$genre',civilite='$Civ' WHERE idagent='$idagent'";
    
     $stmt= $this->connect()->prepare($sql);
     $stmt->bindValue(':idagent', $idagent, PDO::PARAM_INT);
    $stmt->bindValue(':nom',$nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom',$prenom, PDO::PARAM_STR);
    $stmt->bindValue(':addresse', $Adresse,PDO::PARAM_STR);
    $stmt->bindValue(':datenaissance',$DateNaissance, PDO::PARAM_STR);
    $stmt->bindValue(':telephone',$Telephone,PDO::PARAM_STR);
    $stmt->bindValue(':email',$Email,PDO::PARAM_STR);
    $stmt->bindValue(':genre',$genre,PDO::PARAM_STR);
    $stmt->bindValue(':civilite',$Civ,PDO::PARAM_STR);
    
    $stmt->execute();


    $sql1="UPDATE  user SET username='$username',password='$motpasse' WHERE idagent='$idagent' ";
     $stmt1= $this->connect()->prepare($sql1);
     $stmt1->bindValue(':idagent', $idagent, PDO::PARAM_INT);
    $stmt1->bindValue(':username',$username,PDO::PARAM_STR);
    $stmt1->bindValue(':password',$motpasse,PDO::PARAM_STR);  
    $stmt1->execute();
    header("location: {$_SERVER['HTTP_REFERER']}");
}












	
}

?>