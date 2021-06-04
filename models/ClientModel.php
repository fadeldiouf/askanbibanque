<?php
class ClientModel{
    private $nom;
    private $prenom;
    private $address;
    private $datenaissance;
    private $telephone;
    private $email;
    private $username;
    private $password;

/*** constructeur avec paramettre */
    function __construct($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$username,$password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->address = $addresse;
        $this->datenaissance = $datenaissance;
        $this->telephone = $telephone; 
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        
    }
    /*** les getters */
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getAddress(){
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
    public function getUsername(){
        $this->username;
    }
    public function getPassword(){
        $this->password;
    }
    /** les setters */
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setAddresse($addresse){
        $this->address = $addresse;
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
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }

}
?>