<?php
class agence{
    private $nomAgence;
    private $adresse;
    private $dateCreation;

/*** constructeur avec paramettre */
    function __construct($nomAgence,$adresse,$dateCreation)
    {
        $this->nomAgence = $nomAgence;
        $this->adresse = $adresse;
        $this->dateCreation = $dateCreation;
    }
    /*** les getters */
    public function getNomAgence(){
        return $this->nomAgence;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getdateCreation(){
        return $this->dateCreation;
    }
    
    /** les setters */
    public function setNomAgence($nomAgence){
        $this->nomAgence = $nomAgence;
    }
    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }
    public function setDateCreation($dateCreation){
        $this->dateCreation = $dateCreation;
    }
}
?>