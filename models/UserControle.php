<?php
require_once('Database.php');
 class UserControle extends Database{
/*** foncion d'authentification */
public function authentification($usermane,$password){
    $sql= "SELECT nom,prenom,username,password,role FROM agent a,user u, role r WHERE a.idagent = u.idagent AND u.idrole = r.idrole
    AND username = :usermane AND password = :password";
    $stmt =$this->connect()->prepare($sql);
    $stmt->bindValue(':usermane',$usermane, PDO::PARAM_STR);
    $stmt->bindValue(':password',$password, PDO::PARAM_STR);
    $stmt->execute();
  $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    $role = $resultat['role'];
    $prenom = $resultat['prenom'];
    $nom = $resultat['nom'];
    $_SESSION['roleAuth'] = $role;
    $_SESSION['prenomAuth'] = $prenom;
    $_SESSION['nomAuth'] = $nom;

	     return $resultat;
    
    }

}
?>