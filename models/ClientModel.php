<?php
class Client{
    private $nom;
    private $prenom;
    private $addresse;
    private $datenaissance;
    private $telephone;
    private $email;
    private $username;
    private $password;

/*** constructeur avec paramettre */
    function __construct($nom,$prenom,$addresse,$datenaissance,$telephone,$email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->addresse = $addresse;
        $this->datenaissance = $datenaissance;
        $this->telephone = $telephone; 
        $this->email = $email;
        
    }
    /*** les getters */
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getAddresse(){
        return $this->addresse;
    }
    public function getDatenaissance(){
        return $this->datenaissance;
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function getEmail(){
        return $this->email;
    }
    /** les setters */
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setAddresse($addresse){
        $this->addresse = $addresse;
    }
    public function setDatenaissance($datenaissance){
        $this->datenaissance = $datenaissance;
    }
    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    

}
?>