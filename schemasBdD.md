![schemaEA](https://raw.githubusercontent.com/RobinDumontChaponet/synthese/master/schemaEA.jpg)

![schema](https://raw.githubusercontent.com/RobinDumontChaponet/synthese/master/db.png)

Remarques :
===========

  - [fait] Entre spécialisation et type spécialisation, il faut une cardinalité 11 du côté de spécialisation (actuellement 0n)
  - Une spé peut avoir plusieurs typeSpé ???
  - Un ancien peut avoir un seul parent 0/1 niveau Ancien -- Parents ??? Solution proposé : Table liant idParent et idAncien
  - Les parents peuvent avoir mail ?
  - [fait] estSpecialise --> Ajouter idAncien et idSpe
  - [fait] Ajouter idDepartement, idAncien et idDiplomeDUT à aEtudie
  - [fait] Enlever "aEu" entre "ancien" et "DiplomeDUT" et l'attacher à "aEtudie"
  - [fait] Poste --> ajouter clé primaire à idPoste
  - [fait] disposeDe --> AJOUT --> idPage, idDroit + idProfil
  - ajouter "libelle" dans "typeProfile".
  - peut-être ne pas mettre une taille de 50 pour les id mais quelque chose de plus réaliste (5 ?).

- Dans la table Evenement, il n'y a pas de description de l'evenement, est-ce qu'il serait bien d'en mettre une ?