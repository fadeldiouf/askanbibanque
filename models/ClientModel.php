<?php
class Client{
    private $nom;
    private $prenom;
    private $addresse;
    private $datenaissance;
    private $telephone;
    private $email;
    private $genre;

/*** constructeur avec paramettre */
    function __construct($nom,$prenom,$addresse,$datenaissance,$telephone,$email,$genre)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->addresse = $addresse;
        $this->datenaissance = $datenaissance;
        $this->telephone = $telephone; 
        $this->email = $email;
        $this->genre = $genre;
        
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
    public function getGenre(){
        return $this->genre;
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
    public function setGenre($genre){
        $this->genre = $genre;
    }
    function genererNumeroCompte($longueur=10, $listeCar = '0123456789')
    {
    $chaine = '';
    $max = mb_strlen($listeCar, '8bit') - 1;
    for ($i = 0; $i < $longueur; ++$i) {
    $chaine .= $listeCar[random_int(0, $max)];
    }
    return $chaine;
    }
//Utilisation de la fonction

    

}
?>