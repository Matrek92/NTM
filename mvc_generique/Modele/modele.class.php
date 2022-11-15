<?php 
	//extraction //injection des données dans la base
class Modele{
	private $unPDO; //instance de la classe PDO
	private $table ; //la table sur laquelle s'execute les requetes


public function __construct($serveur, $bdd, $user, $mdp)
{
	$this->unPDO = null;
	try{
	$this->unPDO = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp); //PHP DATA Object
	}
		
		catch(PDOexception $exp){
			echo "Erreur de connexion à la BDD <br/>";
			echo $exp->getMessage();
		}
		
}

/******************************** Get et Set sur la table *******************/
public function getTable(){
	return $this->table;
}
public function setTable($uneTable){
	$this->table = $uneTable;
}

/************** Classes ****************/


public function selectAll()
{
	if($this->unPDO != null){
		//exécuter la requete de selection 
		$requete = "select * from " .$this->table . " ; ";
		//preparation de la requete
		$select= $this->unPDO->prepare($requete);
		//execution de la requete
		$select->execute();
		//extraction des résultats
		$lesResultats = $select->fetchAll();	
		return $lesResultats;
	}
	else
		return null;
}
	public function insert($tab)
	{
		if($this->unPDO != null){
			$tabChamps = array();
			$donne = array();
			foreach ($tab as $key => $value) {
				$tabChamps[] = ":".$key;
				$donnees[":".$key] = $value;
			}
			$chaineChamps = implode(",", $tabChamps);
			$requete="insert into " .$this->table." values(null,".$chaineChamps.");";
			$donnees = array(":nom"=>$tab['nom'], ":salle"=>$tab['salle'], ":diplome"=>$tab['diplome']);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	}
	public function selectLike($mot, $tab)
	{
		$tabChamps = array ();
		foreach ($tab as $value) {
			$tabChamps[] = $value ." like :mot ";
		}
		$chaineChamps = implode(" or ", $tabChamps);
		if($this->unPDO != null){
			$requete = "select * from ".$this->table." where ".$chaineChamps." ;"	;
			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			$lesClasses = $select->fetchAll();
			return $lesClasses;
		}else{
			return null;
		}
	}

		public function delete($id, $value)
		{
			if($this->unPDO != null){
				$requete="delete from ".$this->table." where ".$id." = :".$id.";";
				$donnees = array(":".$id=>$value);
				$delete = $this->unPDO->prepare($requete);
				$delete->execute($donnees);
			}
		}

		public function updateClasse($tab){
			if($this->unPDO != null){
				$requete = "update classe set nom=:nom, salle=:salle, diplome=:diplome where idclasse=:idclasse;";
				$donnees=array(":nom"=>$tab['nom'], ":salle"=>$tab['salle'], ":diplome"=>$tab['diplome'], ":idclasse"=>$tab['idclasse']);
				$update=$this->unPDO->prepare($requete);
				$update->execute($donnees);
			}
		}
		public function selectWhereClasse($idclasse){
			if($this->unPDO != null){
				$requete="select * from classe where idclasse=:idclasse;";
				$donnees=array(":idclasse"=>$idclasse);
				$select= $this->unPDO->prepare($requete);
				$select->execute($donnees);
				$uneClasse = $select->fetch();	//un seul resultat
				return $uneClasse;
		}else{
			return null;
		}
	}
/************** Professeurs ****************/


	public function deleteProf($idprofesseur)
		{
			if($this->unPDO != null){
				$requete="delete from professeur where idprofesseur = :idprofesseur	;";
				$donnees = array(":idprofesseur"=>$idprofesseur);
				$delete = $this->unPDO->prepare($requete);
				$delete->execute($donnees);
			}
		}

		public function verifConnexion($email, $mdp)
		{
			if($this->unPDO != null){
				$requete="select * from user where email =:email and mdp=:mdp;";
				$donnees=array(":email"=>$email, ":mdp"=>$mdp);
				$select =$this->unPDO->prepare($requete);
				$select->execute($donnees);
				$unUser = $select->fetch(); //extraire un résultat
				return $unUser;				
			}else{
				return null;
			}
		}


		
}
?>