<?php
require_once('Database.php');
class ClienControle extends Database{
/*** fonction pour rcuprerer les données */
public function getClients(){
    $sql = "SELECT * FROM client";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    while ($resultat = $stmt->fetchAll()){
        return $resultat;
    }
}
}

?>