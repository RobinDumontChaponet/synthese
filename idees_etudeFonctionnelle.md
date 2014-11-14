I/ Importation CSV
==================

L'importation CSV doit permettre à un administrateur de remplir les différentes tables de la base de données à partir d'un fichier csv déjà existant. L'importation des données à partir d'un fichier CSV constitue par conséquent le point de départ de notre travail. En effet, si nous arrivons à créer la page à partir de laquelle nous allons importer les données contenues dans les fichiers CSV, alors cela nous permettra par la suite de faire des tests pour nos autres pages car notre base de données sera remplies. De plus, l'importation des données à partir d'un fichier CSV constitue un point central et capital pour la réussite de notre travail. Effectivement, il ne faut oublier que notre but est de **gérer les données des anciens, des évenements, etc**. Tout autre autre travail n'aura aucune importance si nous n'arrivons pas à importer les données des fichiers CSV car tout autre travail n'est en réalité qu'un moyen de parachever les gestion des données.


Il faudra donc dans un premier temps étudier la question du fichier CSV. Les questions que l'on peut se poser sont les suivantes : 

* Toutes les données sont-elles rassemblées dans un même fichier CSV ou y a-t-il autant de fichiers que de tables ou y a-t-il plusieurs fichiers CSV sans que pour autant les fichier CSV correspondent à des tables (fichier ancien, ecoles, entreprises ...) ?
* Dans chacun des cas précédents, quel est le séparateur utilisé dans le fichier CSV, faut-il demandé à l'administrateur d'indiquer le séparateur ?
* Pourrait-il y a avoir des champs dans les fichiers CSV qui ne correspondent à aucun attribut dans notre base de données ?


Une des idées que l'on pourrait avoir est de permettre à l'administrateur de séléctionner tout d'abord les différents fichiers CSV s'il y en a plusieurs. Ensuite, on pourrait afficher les différents champs des fichiers CSV ensemble (en utilisant les séparateurs) et de permettre ensuite à l'administrateur de faire correspondre à chaque champs affiché à partir du fichier CSV un nom d'attribut de la base de donées. Enfin, l'administrateur va tout naturellement valider la correspondance ce qui va automatiquement remplir la base de données. **Cependant, une question vient à l'esprit, et si l'administrateur se trompe lors de la validation de la correspondance ? (confondre les noms et prénom, ou erreur de miss-click ...)**
Comment peut-on alors permettre à l'administrateur de se corriger ?

**Si quelqu'un a une idée, il peut compléter ici**


II/ pré-rs (pré-réseau social)
==============================

Cette partie est de loin la plus importante et la plus longue. Effectivement, elle concerne la gestion des données ainsi que les éventuelles possibilités de participation des anciens, des professeurs et des administrateur à cette gestion. Plus précisemment, cette partie concerne les droits des différents profils d'ulisateurs, leur permission de compléter leurs informations, la possibilité qu'a un professeur d'ajouter un évenement, la passibilité qu'a un ancien de s'inscrire à un évenement. 

Cette partie doit également permettre la recherche des anciens. J'ai tout simplement repris l'analyse déja faite (qui est bonne à mon sens) en rajoutant quelques remarques :
*  Nom / Prenom (LIKE in SQL) -- Ex : [Pierrreeee Laroche] **Mais si on entre Pierrreeee, même en utilisant le like on ne va rien trouver**
*  Promo : Entre borne **(BETWEEN in SQL)** -- Ex : [1985] - [1989]
*  Diplôme **(LIKE in SQL, on ne sait jamais si celui qui cherche n'entre qu'"informatique")** -- Ex : [DUT Informatique]
*  Pour les autres points, on utilisera également le LIKE.

(-> Nous pourrions permettre certains "caractères de controles", si besoin : guillemets pour une recherche exacte, ...)

**Pour les autres fonctions de cette partie, ce qu'on a ici est bien je trouve (le sujet lui-même est assez clair), il faudra juste rédiger ça en donnant plus de détails : https://github.com/RobinDumontChaponet/synthese/blob/master/etude%20fonctionnelle.md**

### Classes métiers **Si quelqu'un a une idée, il peut compléter ici**
* personne (avec son nom, prenom, ...)
* ancien (hérite de personne + ses propores attributs)
* administrateur (hérite de personne + ses propres attributs)
* evenement(avec son libelle, sa date, ...)
* Ecoles, universités, etc post-DUT
* Formations, spécialites, ...

Il serait intéressant pour les classes métier de faire comme ce qu'on a fait en COA, c'est-à-dire qu'en gros, pour chaque entité créer un objet métier et pour pour chaque association voir les cardinalités :
- si cardinalité 11 0n ou 11 1n, alors représenter la clé étrangère par l'instanciation d'un objet dans un autre
- si 0n 0n, alors créer une classe métier de l'asociation.

**Diagramme des classes à faire, les interactions avec les API utilisées doivent être modélisées**
**Diagramme de séquence à faire également**

III/ Réseau social
==================

Le réseau social est une interface qui permettra aux utilisateurs d'interagir entre eux, que ce soit pour des raisons personnelles ou autour d'un évenements organisé. Dans les deux cas, le réseau social ne peut se faire sans l'étape **"pré-rs"**. Effectivement, l'étape pré-rs aura pour but la gestion des données, leurs visiblités, les droits d'accès, etc. Si cette gestion n'est pas faite, le réseau social n'aura aucun sens. En d'autres termes, la partie *réseau social* aura pour but d'ajouter des fonctionnalités en plus par rapport à la *gestion des anciens*, des fonctionnalités dont le principal objectif et d'animer les interactions entre la communauté des anciens (discussions, messages, ...).

Il a comme but premier de permettre aux personnes ayant été ou étant encore à l'iut de pouvoir communiquer ensemble. Cette communication se ferait par deux moyens : une messagerie et des groupes de discussions. La messagerie se ferait entre deux personnes ou un petit groupe de personnes. Les groupes de discussions concernerait les groupes plus importants. Il y a des groupes par défaut. Par exemple, un groupe comportant tout le monde. Dans ce groupe, il devrait y avoir des droits spécifiques. Tout le monde pourrait voir les posts mais que les administrateurs pourrait poster. Un système de commentaire sera en place et là tout le monde pourrait commenter. Un autre groupe serait possible par défaut regroupant les différentes promo. Plusieurs promos seraient disponible pour un seul étudiant : les redoublants. D'autres groupe de discussions sont possible à la demande des utilisateurs. Ils pourront en créer et y ajouter des personnes grâce au formulaire de recherche. 
Tous les poste des différents groupes concernant une seule personne pourront se retrouver ordonnées par date dans une sorte de fil d'actualité.

Les modifications de la base de données ne sont pas très importantes :
- GROUPE(id_groupe, nom_groupe,permissions)
- Appartient(id_groupe, id_login)
- POST(id_post,id_login, date,texte)
- commentaires(id_com,date,id_post,id_login)
- discussion(id_discussion,date_deb)
- membre_discu(id_discussion,id_login)
- message(id_message,date,id_login,message) 

Remarques et compléments sur le fichier synthese / etude fonctionnelle.md
=========================================================================

A qui est destinées l'application ? L'application est également destinées ax professeurs qui peuvent gérer les évenements et aux administrateurs qui peuvent gérer les droits et les données en général, d'où le fait que des vues seront conçues pour eux.

Quel est l'environnement d'utilisation de l'application ? + Quel contexte d'utilisation ? sur navigateur mais sur mobile aussi ou non ?

Quelles contraintes doit satisfaire l'application ? Pour la sécurtié, est-ce qu'il faut limiter l'accèsau site web à ceux qui ont un login. Par exemple, quand on veut se connecter en dehors de l'IUT à phpmyadmin, on doit s'identifier sur une alert. Est-ce qu'on doit faire la même chose ou non pour restreindre les données des anciens et les infos sur les évenements aux membre de l'IUT ?

