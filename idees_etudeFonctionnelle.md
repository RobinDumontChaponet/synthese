I/ Importation CSV
==================

L'importation CSV doit permettre à un administrateur de remplir les différentes tables de la base de données à partir d'un fichier csv déjà existant. L'importation des données à partir d'un fichier CSV constitue par conséquent le point de départ de notre travail. En effet, si nous arrivons à créer la page à partir de laquelle nous allons importer les données contenues dans les fichiers CSV, alors cela nous permettra par la suite de faire des tests pour nos autres pages car notre base de données sera remplies. De plus, l'importation des données à partir d'un fichier CSV constitue un point central et capital pour la réussite de notre travail. Effectivement, il ne faut oublier que notre but est de **gérer les données des anciens, des évenements, etc**. Tout autre autre travail n'aura aucune importance si nous n'arrivons pas à importer les données des fichiers CSV car tout autre travail n'est en réalité qu'un moyen de parachever les gestion des données.


Il faudra donc dans un premier temps étudier la question du fichier CSV. Les questions que l'on peut se poser sont les suivantes : 

* Toutes les données sont-elles rassemblées dans un même fichier CSV ou y a-t-il autant de fichiers que de tables ou y a-t-il plusieurs fichiers CSV sans que pour autant les fichier CSV correspondent à des tables (fichier ancien, ecoles, entreprises ...) ?
* Dans chacun des cas précédents, quel est le séparateur utilisé dans le fichier CSV, faut-il demandé à l'administrateur d'indiquer le séparateur ?
* Pourrait-il y a avoir des champs dans les fichiers CSV qui ne correspondent à aucun attribut dans notre base de données ?


Une des idées que l'on pourrait avoir est de permettre à l'administrateur de séléctionner tout d'abord les différents fichiers CSV s'il y en a plusieurs. Ensuite, on pourrait afficher les différents champs des fichiers CSV ensemble (en utilisant les séparateurs) et de permettre ensuite à l'administrateur de faire correspondre à chaque champs affiché à partir du fichier CSV un nom d'attribut de la base de donées. Enfin, l'administrateur va tout naturellement valider la correspondance ce qui va automatiquement remplir la base de données. **Cependant, une question vient à l'esprit, et si l'administrateur se trompe lors de la validation de la correspondance ? (confondre les noms et prénom, ou erreur de miss-click ...)**
Comment peut-on alors permettre à l'administrateur de se corriger ?
