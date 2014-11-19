![schemaea](https://cloud.githubusercontent.com/assets/9157490/5077050/493779f2-6ea0-11e4-9b70-cf87a511ec92.jpg)

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

- Dans la table Evenement, il n'y a pas de description de l'evenement, est-ce qu'il serait bien d'en mettre une ?
