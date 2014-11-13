Questions :

- Est-ce que les professeurs ont un profil accessible par les anciens/professeurs ? -> Anciens pourrait avoir envie de contacter un professeur


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
		•	Affichage des évènements
		•	Recherche d'un ancien (détails catégorie "Recherche d'un ancien" plus bas)
		•	Recherche d'un évènement
		•	Connexion à l'aide d'identifiants et mot de passe
		
	Anciens
		•	Permettre aux utilisateurs de renseigner le mail d'un autre utilisateur si celui-ci est vide
		•	Modification de son profil :
			•	Nom d'usage
			•	Adresse
			•	Adresse mail
			•	Diplômes et établissements
				- Si ceux-ci ne sont pas dans la base de données -> AJOUT
			•	Entreprises
				- Si celle-ci n'est pas dans la base de données -> AJOUT
			•	Mot de passe
			•	Numéro de téléphone portable et fixe
			•	Image de profil (pas celle du trombinoscope)
	
	Administrateur
		•	Pouvoir saisir et modifier un ancien et ses différentes données :
			•	Données personnelles
			•	Données de formation post-dut
			•	Données professionnelles et spécialisation sous forme de mots clés
		•	Permettre une évolution des données.
		•	Intégrer sous format csv l’ensemble de la promotion ainsi que les photos.
		•	Génération des identifiants et mots de passe pour les nouveaux utilisateurs après importation CSV et confirmation de la validité des données et envoyé par mail aux anciens créés
		•	Pouvoir envoyer des mails à l’ensemble des anciens, à une promo ciblée, à un ancien en particulier selon des critères.
		•	Pouvoir ajouter/modifier des droits
		
	Professeurs
		•	Faire une recherche sur un évènement, récupérer les anciens qui sont concernés (ou pas) avec l’historique de leur participation.
		•	Pouvoir envoyer des mails à l’ensemble des anciens, à une promo ciblée, à un ancien en particulier selon des critères.
	
	Evènements
		•	Pouvoir gérer les évènements auxquels participent les anciens : journées portes ouvertes, journées PPP, conférence, cours, etc :
		•	Type d’évènement
		•	Date des évènements
		•	Participation des anciens
		•	Gérer aussi le fait que certains anciens sont d’accord pour participer à des types d’évènements.
	
	Recherche d'un ancien
		•	Faire une recherche avec les critères suivants :
			•	Nom / Prenom (LIKE in SQL)	 -- Ex : [Pierrreeee Laroche]
			•	Promo : Entre borne		 -- Ex : [1985] - [1989]
			•	Diplôme			 	 -- Ex : [DUT Informatique]
			•	Spécialisation 			 -- Ex : []
			•	Diplome PostDUT			 -- Ex : [Ingénieur informatique]
			•	Etablissement PostDUT	 	 -- Ex : [Telecom Nancy]
			•	Travail actuellement		 -- Ex : [X] ou [ ]
		•	Pouvoir selectionner les anciens résultant d'une recherche et appliquer les actions suivantes sur eux (professeur et administrateur seulement)
			•	Export des adresses mail
			•	Envoi d'un mail
