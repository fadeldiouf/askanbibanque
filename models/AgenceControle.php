<?php
require_once('Database.php');
class AgenceControle extends Database{
/*** fonction pour rcuprerer les données */
public function getAgence(){
    $sql = "SELECT * FROM agence";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    while ($resultat = $stmt->fetchAll()){
        return $resultat;
    }
}
}

?>