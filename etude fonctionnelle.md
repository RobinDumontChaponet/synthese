Questions :

- Est-ce que les professeurs ont un profil accessible par les anciens/professeurs ? -> Anciens pourrait avoir envie de contacter un ancien


**À qui est destinée l'application ?**

	- Aux anciens étudiants du département

**Quel est l'environnement d'utilisation de l'application ?**

	- Une application web
	
**Quel est le contexte d'utilisation ?**

	- L'application doit être disponible chez soi comme à l'université sur des navigateurs internet

**Quelles contraintes doit satisfaire l'application ?**

	- Sécurité
	- Ergonomie
	- 




####Fonctions

	•	Permettre une gestion des utilisateurs (administrateur, professeur, anciens) avec des droits

	Tous
		•	Affichage d'un profil
		•	Recherche (détails catégorie "Recherche" plus bas)
		
	Anciens
		•	Connexion des utilisateurs à l'aide d'identifiants et mot de passe
		•	Génération des identifiants et mots de passe pour les nouveaux utilisateurs
		•	Envoie des identifiants à l'adresse mail associée dans la BDD
		•	Permettre aux utilisateurs de renseigner le mail d'un autre utilisateur si celui-ci est vide
		•	Modification de son profil :
			•	Nom marital
			•	Adresse
			•	Adresse mail
			•	Diplômes
			•	Entreprises
			•	Mot de passe
	
	Administrateur
		•	Connexion de l'admninistrateur à l'aide d'identifiants et mot de passe
		•	Pouvoir saisir et modifier un ancien et ses différentes données :
			•	Données personnelles
			•	Données de formation post-dut
			•	Données professionnelles et spécialisation sous forme de mots clés
		•	Permettre une évolution des données.
		•	Intégrer sous format csv l’ensemble de la promotion ainsi que les photos.
		•	Pouvoir envoyer des mails à l’ensemble des anciens, à une promo ciblée, à un ancien en particulier selon des critères.
		
	Professeurs
		•	Connexion des professeurs à l'aide d'identifiants et mot de passe
		•	Faire une recherche sur un évènement, récupérer les anciens qui sont concernés (ou pas) avec l’historique de leur participation.
		•	Pouvoir envoyer des mails à l’ensemble des anciens, à une promo ciblée, à un ancien en particulier selon des critères.
	
	Evènements
		•	Pouvoir gérer les évènements auxquels participent les anciens : journées portes ouvertes, journées PPP, conférence, cours, etc :
		•	Type d’évènement
		•	Date des évènements
		•	Participation des anciens
		•	Gérer aussi le fait que certains anciens sont d’accord pour participer à des types d’évènements.
	
	Recherche
	•	Faire une recherche avec les critères suivants :
		•	Nom / Prenom (LIKE in SQL)	 -- Ex : [Pierrreeee Laroche]
		•	Promo : Entre borne		 -- Ex : [1985] - [1989]
		•	Diplôme			 	 -- Ex : [DUT Informatique]
		•	Spécialisation 			 -- Ex : []
		•	Diplome PostDUT			 -- Ex : [Ingénieur informatique]
		•	Etablissement PostDUT	 	 -- Ex : [Telecom Nancy]
		•	Travail actuellement		 -- Ex : [X] ou [ ]
	•	Pouvoir selectionner les anciens résultant d'une recherche et appliquer les actions suivantes sur eux :
		•	Export des adresses mail
		•	Envoi d'un mail
