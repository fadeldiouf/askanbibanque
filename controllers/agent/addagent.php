

<?php 
//injection de dependance
include('../../models/agentControle.php');
include('../../models/agent.php');
include('../../models/UserModel.php');
/*
instance de la classe UseControle 
et creation de l'objet qui s'appele userController de la classe UseControle
*/



$agentController = new AgentControle();
if (isset($_POST['ajouter'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$Adresse = $_POST['Adresse'];
	$DateNaissance = $_POST['DateNaissance'];
    $Telephone = $_POST['Telephone'];
	$Email = $_POST['Email'];
	$genre = $_POST['genre'];
	$Civ = $_POST['Civ'];
	$password = $_POST['motpasse'];
	$username = $_POST['login'];



	//instance de classe User et agent
	$agent = new Agent($nom,$prenom,$Adresse,$DateNaissance,$Telephone,$Email,$genre,$Civ);
	$user= new User($username,$password);

	//appele a la fonction addUser de la useControle qui permet d'inserer des users a la base de donn"e
	$agentController->addAgent($agent,$user);

}


if (isset($_POST['updateData'])) {
	$nom = $_POST['FirstName'];
	$prenom = $_POST['LastName'];


	$username = $_POST['login'];
	$motpasse = $_POST['motpasse'];

	$Adresse = $_POST['Adresse'];
	$DateNaissance = $_POST['DateNaissance'];
    $Telephone = $_POST['Telephone'];
	$Email = $_POST['Email'];
	$genre = $_POST['genre'];
	$Civ = $_POST['Civ'];
	$idagent = $_POST['updateId'];
	



	//instance de classe User et agent
	$agent = new Agent($nom,$prenom,$Adresse,$DateNaissance,$Telephone,$Email,$genre,$Civ);
	$user= new User($username,$motpasse);

	//appele a la fonction addUser de la useControle qui permet d'inserer des users a la base de donn"e
	$agentController->updateagent($nom,$prenom,$Adresse,$DateNaissance,$Telephone,$Email,$genre,$Civ,$username,$motpasse,$idagent);

}

 ?>