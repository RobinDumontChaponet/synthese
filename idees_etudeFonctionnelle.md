I/ Importation CSV
==================

L'importation CSV doit permettre à un administrateur de remplir les différentes tables de la base de données à partir d'un fichier csv déjà existant. Il faudra donc dans un premier temps étudié le fichier CSV. Les questions que l'on peut se poser sont les suivantes : 

* Toutes les données sont-elles rassemblées dans un même fichier CSV ou y a-t-il autant de fichiers que de tables ou y a-t-il plusieurs fichiers CSV sans que pour autant les fichier CSV correspondent à des tables (fichier ancien, ecoles, entreprises ...) ?
* Dans chacun des cas précédents, quel est le séparateur utilisé dans le fichier CSV, faut-il demandé à l'administrateur d'indiquer le séparateur ?
* Pourrait-il y a avoir des champs dans les fichiers CSV qui ne correspondent à aucun attribut dans notre base de données ?


Une des idées que l'on pourrait avoir est de permettre à l'administrateur de séléctionner tout d'abord les différents fichiers CSV s'il y en a plusieurs. Ensuite, on pourrait afficher les différents champs des fichiers CSV ensemble (en utilisant les séparateurs) et de permettre ensuite à l'administrateur de faire correspondre à chaque champs affiché à partir du fichier CSV un nom d'attribut de la base de donées. Enfin, l'administrateur va tout naturellement valider la correspondance ce qui va automatiquement remplir la base de données. ** Cependant, une question vient à l'esprit, et si l'administrateur se trompe lors de la validation de la correspondance ? (confondre les noms et prénom, ou erreur de miss-click ...) **
