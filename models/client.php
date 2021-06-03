<?php
class Client{
    private $nom;
    private $prenom;
    private $address;
    private $datenaissance;
    private $telephone;
    private $email;
    private $username;
    private $password;

/*** constructeur avec paramettre */
    function __construct($nom,$prenom,$address,$datenaissance,$telephone,$email,$username,$password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->address = $address;
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
        return $this->address;
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
    public function setAddress($address){
        $this->address = $address;
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