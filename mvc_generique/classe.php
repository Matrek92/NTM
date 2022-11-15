<h2>Gestion des classes</h2>

<?php 
	$unControleur->setTable("classe");
	if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
	{

		$laClasse = null;



		if(isset($_GET['action']) && isset($_GET['idclasse']))
		{
			$action = $_GET['action'];
			$idclasse = $_GET['idclasse'];
			switch($action)
			{
				case "sup" : $unControleur->delete("idclasse", $idclasse) ; break;
				case "edit" : $laClasse = $unControleur->selectWhereClasse($idclasse);
				break;
			}
		}

		

		require_once("vue/vue_insert_classe.php");
		if(isset($_POST['Valider']))
		{
			$tab = array("nom"=>$_POST['nom'], "salle"=>$_POST['salle'], "diplome"=>$_POST['diplome']);
			$unControleur->insert($tab);
		}

		if(isset($_POST['Modifier']))
		{
			$unControleur->updateClasse($_POST);
			header("Location: index.php?page=1");
		}
	}

	if(isset($_POST['Filtrer']))
	{
		$mot = $_POST['mot'];
		$tab = array("nom", "salle", "diplome");
		$lesClasses = $unControleur->selectLike($mot, $tab);
	}else{
		$lesClasses = $unControleur->selectAll();
	}

	require_once("vue/vue_les_classes.php");

?>