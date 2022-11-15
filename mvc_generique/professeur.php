<h2>Gestion des professeurs</h2>

<?php 
	$unControleur->setTable("professeur");
	if(isset($_GET['action']) && isset($_GET['idprofesseur'])){
		$action = $_GET['action'];
		$idprofesseur = $_GET['idprofesseur'];
		switch($action){
			case "sup" : $unControleur->deleteProf($idprofesseur) ; break;
			case "edit" : break;
		}
	}



	require_once("vue/vue_insert_professeur.php");
	if(isset($_POST['Valider']))
	{
		$tab = array("nom"=>$_POST['nom'], "salle"=>$_POST['salle'], "diplome"=>$_POST['diplome']);
		$unControleur->insert($tab);
	}

	if(isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$tab = array("nom", "salle", "diplome");
		$lesProfs = $unControleur->selectLike($mot);
	}else{
		$lesProfs = $unControleur->selectAll();
	}

	require_once("vue/vue_les_professeur.php");

?>