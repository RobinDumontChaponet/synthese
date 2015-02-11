(On fait le tri de ce qu'il y a en dessous au fur et à mesure)


-- SUPPRIMER CE QUI EST FAIT --

- évènement : + nom;
- retours pages;
- suppression ou ajout d’un ancien dans event par l’admin;
- lien vers preferences d’événements dans réglages de comptes;
- notifications mails et inscriptions event;
- enlever « inscription à la newsletter » de l'admin;
- résultat diplôme pas forcément un nombre et pas obligatoire;
- vérification sur la période dans les diplômes;
- recherche dans les comptes;
- promo en liste;
- dans les résultats de recherche : - "(info)";
- dans promotions : afficher par diplômes;
- lien vers le profil dans la liste de comptes;
- recherche dans les comptes;
- dans dB ajouter un boolean pour ne pas être dans la recherche;

Style :
	- Styler la page Profil et Profil-editer au niveau des Diplômes
	- Styler sur la page de profil (faire une séparation entre DiplômesDUT et Diplômes)
	- Styler la page diplomeDUT-selectionner (niveau du nom à mettre en maj, ainsi que le <p> qui indique que la promo sera créer et "retour étudiant")
	- Distinguer les catégories "Inscrit", "Non inscrit", "Passés", "A venir" afin qu'ils ressortent plus (demande de prof)
	- Styler le bouton retour sur diplomeDUT-selectionner
	- Dans diplome-selectionner mettre le nom de la personne en majuscule
	- Styler dans Profil-editer l'input de type date pour Birthday

Victor :
	- Faire le système de retour de page (Je comprendrai ...) (ah bah je comprends plus)
	- Dans etablissement-editer, remplacer le input text du pays par un select.

Profil :
	- Ajouter un lien "Envoyer de nouveaux identifiants" sur un profil quand user est admin.

diplomeDUT-selectionner :
	- Créer la promotion si elle n'existe pas

Recherche :
	- Pouvoir sélectionner les anciens résultant d'une recherche et appliquer les actions suivantes sur eux (professeur et administrateur seulement !) :
		- Export des adresses mail
		- Envoi d'un mail

Autres :
	- Pour "Ma promotion", il va falloir récupérer la dernière promotion de la personne
	- Vérifier les noms des pages
	- Faire une pagination dans comptes




SI ON A LE TEMPS :
	- Ajouter des liens du genre de "Chercher les anciens avec ce diplôme" sur la page d'un diplôme (par exemple) qui ouvre la recherche avec déjà le diplôme renseigné !












---


- Diplômes : Renseigner si obtenue ou non !

- Faire la page d'accueille, par exemple :
	- pour ancien : news de sa promo, messages, et les machins de réseau social que Mathieu mets 3 ans à faire
	- pour prof : les dernières activités/évènements ouverts par lui, messages, et tout le bazar
	- pour admin : un mélange des deux premiers, en fait... faut réchéflir


- Limiter le nombre d'events <<passés>> ~ 10 (constante "LINE_PAGE" !) devrait suffire avec une pagination pour les voir tous ?

- Faire entreprise-ajouter
- Faire diplome-ajouter
- Faire diplome-supprimer

- Ajouter des bulles d'aides (je vous explique quand vous voulez)

Profil :

- Faire la suppression d'un diplôme dans profil (ça supprime le lien Possede)
- Faire l'ajout d'un diplome (ajoute un lien possede)

- Faire l'ajout d'une entreprise (ajoute un lien travaille)
- Faire la suppression d'une entreprise (supprime le lien travaille)


