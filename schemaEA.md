![schemaea](https://cloud.githubusercontent.com/assets/9157490/5076908/0ef23648-6e9f-11e4-858e-6b0d66acfb7e.jpg)

Remarques : (peut être les garder pour les faire valider par notre professionnel)
===========

  - [fait] Entre spécialisation et type spécialisation, il faut une cardinalité 11 du côté de spécialisation (actuellement 0n)
//Demandes de modif de Victor//
  - Une spé peut avoir plusieurs typeSpé ???
  - Un ancien peut avoir un seul parent 0/1 niveau Ancien -- Parents ??? Solution proposé : Table liant idParent et idAncien
  - Les parents peuvent avoir mail ?

  - [fait] estSpecialise --> Ajouter idAncien et idSpe
  - [fait] Ajouter idDepartement, idAncien et idDiplomeDUT à aEtudie
  - [fait] Enlever "aEu" entre "ancien" et "DiplomeDUT" et l'attacher à "aEtudie"
  - [fait] Poste --> ajouter clé primaire à idPoste
  - [fait] disposeDe --> AJOUT --> idPage, idDroit + idProfil
