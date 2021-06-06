<?php
require_once('Database.php');
 class UserControle extends Database{
/*** foncion d'authentification */
public function authentification($usermane,$password){
    $sql= " SELECT g.nomagence as agence,a.nom,a.prenom,u.idagent as ID,username,password,role FROM agence g, agent a,user u, role r 
    WHERE g.idagence = a.idagence ANd a.idagent = u.idagent AND u.idrole = r.idrole AND username = :usermane AND password = :password";
    $stmt =$this->connect()->prepare($sql);
    $stmt->bindValue(':usermane',$usermane, PDO::PARAM_STR);
    $stmt->bindValue(':password',$password, PDO::PARAM_STR);
    $stmt->execute();
  $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    $role = $resultat['role'];
    $prenom = $resultat['prenom'];
    $nom = $resultat['nom'];
    $id= $resultat['ID'];
    $agence= $resultat['agence'];
    $_SESSION['roleAuth'] = $role;
    $_SESSION['prenomAuth'] = $prenom;
    $_SESSION['nomAuth'] = $nom;
    $_SESSION['idAuth'] = $id;
    $_SESSION['agence'] = $agence;

	     return $resultat;
    
    }

}
?>