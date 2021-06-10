<?php 
session_start();
include('Database.php');
class AgentControle extends Database{
	/**
	 * fonction pour recuperer tous les enregistrements de user
	 **/
	public function getagent(){
        $id_agence=$_SESSION['id_agence'];
		$sql="SELECT * FROM agent WHERE idagence=:id_agence ";
		$stmt= $this->connect()->prepare($sql);
        $stmt->bindValue(':id_agence',$id_agence, PDO::PARAM_STR);
		$stmt->execute();
		while ($result = $stmt->fetchAll()) {
			return $result;
		}
	}


    /* fonction pour inserer les users a la base de donnée
    **/
   public function addAgent(Agent $agent){

       $sql="INSERT INTO agent(nom,prenom,adresse,datenaissance,telephone,email,genre,civilite) VALUES(:nom,:prenom,:Adresse,:DateNaissance,:Telephone,:Email,:genre,:Civ)";
       $stmt= $this->connect()->prepare($sql);
       $stmt->bindValue(':nom', $agent->getNom(), PDO::PARAM_STR);
       $stmt->bindValue(':prenom', $agent->getPrenom(), PDO::PARAM_STR);
       $stmt->bindValue(':Adresse', $agent->getAdresse(), PDO::PARAM_STR);
       $stmt->bindValue(':DateNaissance', $agent->getDateNaissance(), PDO::PARAM_STR);
       $stmt->bindValue(':Telephone', $agent->getTelephone(), PDO::PARAM_STR);
       $stmt->bindValue(':Email', $agent->getEmail(), PDO::PARAM_STR);
       $stmt->bindValue(':genre', $agent->getgenre(), PDO::PARAM_STR);
       $stmt->bindValue(':Civ', $agent->getCivilite(), PDO::PARAM_STR);
       $stmt->execute();
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
	
}

?>