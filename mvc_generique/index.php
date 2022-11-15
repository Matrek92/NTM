<?php 
	session_start();
	require_once("controleur/controleur.class.php");
	require_once("controleur/config_bdd.php");
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp); 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scolarite IRIS</title>
</head>
<body>
<center>
	<h1>Scolarite IRIS</h1>
	<br/>
	<?php
		if(! isset($_SESSION['email'])) 
		{
			require_once("vue/vue_connexion.php");
		}
		if(isset($_POST['seConnecter']))
		{
			$email = $_POST['email'];
			$mdp = $_POST['mdp'];
			$unUser = $unControleur->verifConnexion($email, $mdp);
			if($unUser==null){
				echo "<br> Vérifiez vos identifiants";
			}else{
				$_SESSION['email'] = $unUser['email'];
				$_SESSION['nom'] = $unUser['nom'];
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];
				header("Location: index.php?page=0");
			}
		}
	if(isset($_SESSION['email']))
	{
	echo'
		<a href="index.php?page=0">
			<img src="images/home.png" height="150" width="150" >
		</a>
		<a href="index.php?page=1">
			<img src="images/classe.png" height="150" width="150" >
		</a>
		<a href="index.php?page=2">
			<img src="images/etudiant.png" height="150" width="150" >
		</a>
		<a href="index.php?page=3">
			<img src="images/professeur.png" height="150" width="150" >
		</a>
		<a href="index.php?page=4">
			<img src="images/enseignement.png" height="150" width="150" >
		</a>
		<a href="index.php?page=5">
			<img src="images/deconnexion.png" height="150" width="150" >
		</a>
		';
	
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		else
			$page = 0;
		switch($page){
			case 0 : require_once("home.php"); break;
			case 1 : require_once("classe.php"); break;
			case 2 : require_once("etudiant.php"); break;
			case 3 : require_once("professeur.php"); break;
			case 4 : require_once("enseignement.php"); break;
			case 5 : session_destroy();
					 unset($_SESSION['email']);
					 header("Location: index.php");
			break;
		}
	}//fin du if SESSION
	?>

</center>

</body>
</html>