




![schemaea](https://cloud.githubusercontent.com/assets/9157490/5057282/c3fa4b74-6cb6-11e4-9ce5-a7c56efb2fd9.jpg)

Remarques : (peut être les garder pour les faire valider par notre professionnel)
===========

- Entre spécialisation et type spécialisation, il faut une cardinalité 11 du côté de spécialisation (actuellement 0n)
- //Demandes de modif de Victor//
- Une spé peut avoir plusieurs typeSpé ???
- Un ancien peut avoir un seul parent 0/1 niveau Ancien -- Parents ??? Solution proposé : Table liant idParent et idAncien
- Les parents peuvent avoir mail ?

- estSpecialise --> Ajouter idAncien et idSpe
- Ajouter idDepartement, idAncien et idDiplomeDUT à aEtudie
- Enlever "aEu" entre "ancien" et "DiplomeDUT" et l'attacher à "aEtudie"
- Poste --> ajouter clé primaire à idPoste
