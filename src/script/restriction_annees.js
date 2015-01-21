function selection() {
        //On recupere les select
        var selectDeb = document.getElementById("promotionInf");
        var selectFin = document.getElementById("promotionSup");


        //On gere la date de debut
        var dateDebut = selectDeb.options[selectDeb.selectedIndex].value;


        if (dateDebut == '')
        {
            dateDebut = selectDeb.options[selectDeb.options.length - 1].value;
        }

        //On gere la date de fin
        var dateFin = selectDeb.options[1].value;


    //CHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANGE
        var i;
        for(i = (selectFin.options.length-1); i >= 0; i--)
        {
            selectFin.remove(selectFin.options[i]);
        }

            //Pour permettre un choix vide
            var vide = document.createElement('option');
            vide.value = '';
            vide.innerHTML = '';
            selectFin.appendChild(vide);


        for(var j = dateFin; j >= dateDebut; j--)
        {
            //alert(contient(selectDeb.options, j));
            if(contient(selectDeb.options, j) == 1)
            {
                var option = document.createElement('option');
                option.value = j;
                option.innerHTML = j;
                selectFin.appendChild(option);
            }


        }

        /*Analyse du problème + remarques
            - Si on fait un alert(selectFin.options.lenght); on remarque que le nombre de date dans le selectFin est correct
            Par conséquent, les dates de 1 à X sont ajoutées en dehors du script

            - Si on clique sur le vide, l'algorithme doit cherché la plus petite date ainsi que la plus grande date
            dans le selectDebut et remplir le selectFin avec les dates entre ces deux bornes (un vide avant le remplissage n'est pas oublié)

            - On remarque également que le problème ne vient pas de la vue, car si l'on rajoute un script dans la vue pour afficher les
            date qui sont ajoutées, on ne retrouve jamais la date 1, 2, etc. Les dates sont cohérantes
                En effet, c'est le script qui modifie le contenu des selects et la boucle dans la vue ne remplit qu'au chargement de la
                page, donc une seule fois

            - L'erreur a été trouvée, il s'agit d'un script qui se trouve dans la vue et qui refait un traitement pour ajouter les dates
                Cependant, en l'enlevant, un nouveau problème se pose, les résultats de la recherche ne s'affichent plus

            - Finalement, le bug ce dernier bug a été résolu, le problème était que la suppression accidentelle de init_search() qui permet
                d'initialiser les résultats de la recherche
        */
    }

function contient(tab, date)
{

    taille = tab.length;
    i = 0;

    while(i < taille)
    {
        if(tab[i].value == date)
        {
            return 1;
        }else{
            i++;
        }
    }

    return 0;
}
