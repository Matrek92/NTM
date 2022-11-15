drop database if exists nom_iris_lm_23;
create database mon_iris_lm_23;
use mon_iris_lm_23;

	create table classe(
		idclasse int(3) not null auto_increment,
		nom varchar(50),
		salle varchar(50),
		diplome varchar(50),
		primary key(idclasse)
		);
	create table etudiant(
		idetudiant int(3) not null auto_increment,
		nom varchar(50),
		prenom varchar(50),
		email varchar(50),
		idclasse int(3) not null,
		primary key(idetudiant),
		foreign key(idclasse) references classe(idclasse)
		);
	create table professeur(
		idprofesseur int(3) not null auto_increment,
		nom varchar(50),
		prenom varchar(50),
		diplome varchar(50),
		primary key(idprofesseur)
		);
	create table enseignement(
		idenseignement int(3) not null auto_increment,
		matiere varchar(50),
		nbheures int(3),
		coeff int(2),
		idclasse int(3) not null,
		idprofesseur int(3) not null,
		primary key(idenseignement),
		foreign key(idclasse) references classe(idclasse),
		foreign key(idprofesseur) references professeur(idprofesseur)
		);

	insert into classe values
		(null, "BTS LM", "Salle 3.10", "BTS SIO"),
		(null, "BTS JV", "Salle 3.8", "BTS SIO");

	insert into etudiant values
		(null, "Nael", "Clara", "a@gmail.com", 1),
		(null, "Prince", "Vallentin", "b@gmail.com", 2);
	insert into professeur values
		(null, "ben", "oka", "bac"),
		(null, "Chouaky", "Abdel", "bac");

	insert into enseignement values
		(null, "Java", 120, 4, 1, 1),
		(null, "BDD", 100, 2, 1, 2);

	create table user(
		iduser int (3) not null auto_increment,
		nom varchar(30),
		prenom varchar(30),
		email varchar(100),
		mdp varchar(100),
		role enum("admin", "user"),
		primary key(iduser));

	insert into user values 
	(null, "Vallentin", "Quentin", "a@gmail.com", "123", "admin"),
	(null, "Prince", "Clara", "b@gmail.com", "456", "user");