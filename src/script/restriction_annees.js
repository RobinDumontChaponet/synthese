function selection()
    {
        //On recupere les select
        var selectDeb = document.getElementById("promotionInf");
        var selectFin = document.getElementById("promotionSup");

        //On gere la date de debut
        var dateDebut = selectDeb.options[selectDeb.selectedIndex].value;

        if(dateDebut == '')
        {
            dateDebut = selectDeb.options[selectDeb.options.length-1].value;
        }

        //On gere la date de fin
        var dateFin = selectDeb.options[1].value;

        for(var i = (selectFin.options.length-1); i >= 0; i--)
        {
            selectFin.remove(selectFin.options[i]);
        }

            var vide = document.createElement('option');
            vide.value = '';
            vide.innerHTML = 'j';
            selectFin.appendChild(vide);

        for(var j = dateDebut; j <= dateFin; j++)
        {
            var option = document.createElement('option');
            option.value = j;
            option.innerHTML = j;
            selectFin.appendChild(option);
        }


    }
