<h2>Gestion des professeurs</h2>

<?php 

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
		$unControleur->insertProfs($_POST);
	}

	if(isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$lesProfs = $unControleur->selectLikeProfs($mot);
	}else{
		$lesProfs = $unControleur->selectAllProfs();
	}

	require_once("vue/vue_les_professeur.php");

?>