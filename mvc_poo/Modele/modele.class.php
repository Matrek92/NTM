<?php 
	//extraction //injection des données dans la base
class Modele{
	private $unPDO; //instance de la classe PDO


public function __construct()
{
	$this->unPDO = null;
	try{
	$this->unPDO = new PDO("mysql:host=localhost;dbname=mon_iris_lm_23", "root", ""); //PHP DATA Object
	}
		
		catch(PDOexception $exp){
			echo "Erreur de connexion à la BDD <br/>";
			echo $exp->getMessage();
		}
		
}

/************** Classes ****************/


public function selectAllClasses()
{
	if($this->unPDO != null){
		$requete = "select * from classe ; ";
		//preparation de la requete
		$select= $this->unPDO->prepare($requete);
		$select->execute();
		//extraction des classes
		$lesClasses = $select->fetchAll();	
		return $lesClasses;
	}
	else
		return null;
}
	public function insertClasse($tab)
	{
		if($this->unPDO != null){
			$requete="insert into classe values(null, :nom, :salle, :diplome); ";
			$donnees = array(":nom"=>$tab['nom'], ":salle"=>$tab['salle'], ":diplome"=>$tab['diplome']);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	}
	public function selectLikeClasses($mot)
	{
		if($this->unPDO != null){
			$requete = "select * from classe where nom like :mot or salle like :mot or diplome like :mot ;";
			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			$lesClasses = $select->fetchAll();
			return $lesClasses;
		}else{
			return null;
		}
	}

		public function deleteClasse($idclasse)
		{
			if($this->unPDO != null){
				$requete="delete from classe where idclasse = :idclasse	;";
				$donnees = array(":idclasse"=>$idclasse);
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


public function selectAllProfs()
{
	if($this->unPDO != null){
		$requete = "select * from professeur ; ";
		//preparation de la requete
		$select= $this->unPDO->prepare($requete);
		$select->execute();
		//extraction des prof
		$lesProfs = $select->fetchAll();	
		return $lesProfs;
	}
	else {
		return null;
	}
}
	public function insertProfs($tab)
	{
		if($this->unPDO != null){
			$requete="insert into professeur values(null, :nom, :prenom, :diplome); ";
			$donnees = array(":nom"=>$tab['nom'], ":prenom"=>$tab['prenom'], ":diplome"=>$tab['diplome']);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	}
	public function selectLikeProfs($mot)
	{
		if($this->unPDO != null){
			$requete = "select * from professeur where nom like :mot or prenom like :mot or diplome like :mot ;";
			$donnees = array(":mot"=>"%".$mot."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			$lesProfs = $select->fetchAll();
			return $lesProfs;
		}else{
			return null;
		}
	}


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