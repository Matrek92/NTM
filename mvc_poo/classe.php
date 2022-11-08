<h2>Gestion des classes</h2>

<?php 
	

	$laClasse = null;



	if(isset($_GET['action']) && isset($_GET['idclasse'])){
		$action = $_GET['action'];
		$idclasse = $_GET['idclasse'];
		switch($action){
			case "sup" : $unControleur->deleteClasse($idclasse) ; break;
			case "edit" : $laClasse = $unControleur->selectWhereClasse($idclasse);
			break;
		}
	}

	

	require_once("vue/vue_insert_classe.php");
	if(isset($_POST['Valider']))
	{
		$unControleur->insertClasse($_POST);
	}

	if(isset($_POST['Modifier']))
	{
		$unControleur->updateClasse($_POST);
		header("Location: index.php?page=1");
	}

	if(isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$lesClasses = $unControleur->selectLikeClasses($mot);
	}else{
		$lesClasses = $unControleur->selectAllClasses();
	}

	require_once("vue/vue_les_classes.php");

?>