<?php 
 	require_once ("modele/modele.class.php");
 	class Controleur
 	{
 		private $unModele;
 		public function __construct($serveur, $bdd, $user, $mdp){
 			$this->unModele = new Modele($serveur, $bdd, $user, $mdp);
 		}
 		/********************************* Get and Setter *********************/
 		public function getTable(){
 			return $this->unModele->getTable();
 		}
 		public function setTable($uneTable){
 			return $this->unModele->setTable($uneTable);
 		}



 		public function selectAll(){
 			$lesResultats = $this->unModele->selectAll();
 			return $lesResultats;
 		}
 		public function insert($tab)
 		{
 			//controler les données avant de les envoyer au modele 
 			$this->unModele->insert($tab);
 		}
 		public function selectLike($mot, $tab)
 		{
 			$lesResultats = $this->unModele->selectLike($mot, $tab);
 			return $lesResultats;
 		}
 		public function delete($id, $value)
 		{
 			$this->unModele->delete($id, $value);
 		}
 		public function updateClasse($tab)
 		{
 			$this->unModele->updateClasse($tab);
 		}
 		public function selectWhereClasse($idclasse)
 		{
 			return $this->unModele->selectWhereClasse($idclasse);
 		}



 		
 		public function selectLikeProfs($mot)
 		{
 			$lesProfs = $this->unModele->selectLikeProfs($mot);
 			return $lesProfs;
 		}
 		
 		public function verifConnexion ($email, $mdp){
 			//controler les email / mdp
 			$unUser = $this->unModele->verifConnexion($email, $mdp);
 			return $unUser;
 		}

}

?>