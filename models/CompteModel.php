<?php
class Compte{
    private $solde;
    private $datecreation;
    private $type_compe;
    function __construct($solde,$datecreation,$type_compe)
    {
        $this->solde=$solde;
        $this->datecreation=$datecreation;
        $this->type_compe=$type_compe;
    }
     
    
    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @return  self
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }


    /**
     * Get the value of datecreation
     */ 
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Set the value of datecreation
     *
     * @return  self
     */ 
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get the value of active
     */ 

    /**
     * Get the value of type_compe
     */ 
    public function getType_compe()
    {
        return $this->type_compe;
    }

    /**
     * Set the value of type_compe
     *
     * @return  self
     */ 
    public function setType_compe($type_compe)
    {
        $this->type_compe = $type_compe;

        return $this;
    }
    /** foncion de generation du numero de compte */
    function genererNumeroCompte($longueur=10, $listeCar = '0123456789')
    {
    $chaine = '';
    $max = mb_strlen($listeCar, '8bit') - 1;
    for ($i = 0; $i < $longueur; ++$i) {
    $chaine .= $listeCar[random_int(0, $max)];
    }
    return $chaine;
    }
}
?>