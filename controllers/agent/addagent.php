

<?php 
//injection de dependance
include('../../models/agentControle.php');
include('../../models/agent.php');
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



	//instance de classe User
	$agent = new Agent($nom,$prenom,$Adresse,$DateNaissance,$Telephone,$Email,$genre,$Civ);

	//appele a la fonction addUser de la useControle qui permet d'inserer des users a la base de donn"e
	$agentController->addAgent($agent);

}

 ?>