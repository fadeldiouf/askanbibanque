<?php
class Agence{
    private $nomagence;
    private $adresse;
    private $datecreation;

/*** constructeur avec paramettre */
    function __construct($nomagence,$adresse,$datecreation)
    {
        $this->nomagence = $nomagence;
        $this->adresse = $adresse;
        $this->datecreation = $datecreation;
    }
    /*** les getters */
    public function getNomagence(){
        return $this->nomagence;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getDatecreation(){
        return $this->datecreation;
    }
    
    /** les setters */
    public function setNomagence($nomagence){
        $this->nomagence = $nomagence;
    }
    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }
    public function setDatecreation($datecreation){
        $this->datecreation = $datecreation;
    }
}
?>