function selection()
    {
        var selectItem = document.getElementById("promotionInf");
        selectItem.onchange = adaptationSup(selectItem);
    }


    function adaptationSup(selectItem)
    {
        var dateDebut = selectItem.options[selectItem.selectedIndex].value;
        var dateLimite = selectItem.options[1].value;
        var selectItem2 = document.getElementById("promotionSup");

        //On supprime d'abord tous les éléments existants
        var l = selectItem2.options.length;
        for (var j = (l-1); j >= 0; j--) {
          selectItem2.removeChild(selectItem2.options[j]);
        }

        //Ensuite, on remet les dates cohérantes
       for (var i = dateDebut; i<=dateLimite; i++){
          var option = document.createElement('option');
          option.value = i;
          option.innerHTML = i;
          selectItem2.appendChild(option);
       }
      }
