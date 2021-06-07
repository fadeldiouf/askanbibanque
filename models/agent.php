<?php
Class Agent {

    private $nom;
	private $prenom;
	private $Adresse;
	private $DateNaissance;
    private $Telephone;
	private $Email;
	private $genre;
	private $civilite;


     /***
     *contructeur avec les parametres des variables declares 
     */
	function __construct($nom,$prenom,$Adresse,$DateNaissance,$Telephone,$Email,$genre,$civilite){
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->Adresse = $Adresse;
		$this->DateNaissance = $DateNaissance;
        $this->Telephone = $Telephone;
		$this->Email = $Email;
		$this->genre = $genre;
		$this->civilite = $civilite;
	}

/***
     *getters
     */
	public function getNom(){
		return $this->nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function getAdresse(){
		return $this->Adresse;
	}

	public function getDateNaissance(){
		return $this->DateNaissance;
	}


    public function getTelephone(){
		return $this->Telephone;
	}

	public function getEmail(){
		return $this->Email;
	}


	public function getgenre(){
		return $this->genre;
	}

	public function getcivilite(){
		return $this->civilite;
	}
	/***
     *setters
     */
	public function setNom($nom){
		$this->nom = $nom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function setAdresse($Adresse){
		$this->Adresse = $Adresse;
	}

	public function setDateNaissance($DateNaissance){
		$this->DateNaissance = $DateNaissance;
	}



    public function setTelephone($Telephone){
		$this->Telephone = $Telephone;
	}

	public function Email($Email){
		$this->Email = $Email;
	}

	public function setgenre($genre){
		$this->genre = $genre;
	}

	public function setcivilite($civilite){
		$this->civilite = $civilite;
	}
 

}
?>