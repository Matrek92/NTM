<?php 
 	require_once ("modele/modele.class.php");
 	class Controleur
 	{
 		private $unModele;
 		public function __construct(){
 			$this->unModele = new Modele();
 		}
 		public function selectAllClasses(){
 			$lesClasses = $this->unModele->selectAllClasses();
 			return $lesClasses;
 		}
 		public function insertClasse($tab)
 		{
 			//controler les données avant de les envoyer au modele 
 			$this->unModele->insertClasse($tab);
 		}
 		public function selectLikeClasses($mot)
 		{
 			$lesClasses = $this->unModele->selectLikeClasses($mot);
 			return $lesClasses;
 		}
 		public function deleteClasse($idclasse)
 		{
 			$this->unModele->deleteClasse($idclasse);
 		}
 		public function updateClasse($tab)
 		{
 			$this->unModele->updateClasse($tab);
 		}
 		public function selectWhereClasse($idclasse)
 		{
 			return $this->unModele->selectWhereClasse($idclasse);
 		}





 		public function selectAllProfs(){
 			$lesProfs = $this->unModele->selectAllProfs();
 			return $lesProfs;
 		}
 		public function insertProfs($tab)
 		{
 			//controler les données avant de les envoyer au modele 
 			$this->unModele->insertProfs($tab);
 		}
 		public function selectLikeProfs($mot)
 		{
 			$lesProfs = $this->unModele->selectLikeProfs($mot);
 			return $lesProfs;
 		}
 		public function deleteProf($idprofesseur)
 		{
 			$this->unModele->deleteProf($idprofesseur);
 		}

 		public function verifConnexion ($email, $mdp){
 			//controler les email / mdp
 			$unUser = $this->unModele->verifConnexion($email, $mdp);
 			return $unUser;
 		}


 	}

?>