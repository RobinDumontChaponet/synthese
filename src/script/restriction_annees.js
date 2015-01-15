function selection()
{
    var select = document.getElementById("promotionInf");
    select.onchange = function(){adaptationSup(this)};
    select.onclick = select.onchange;
}

function adaptationSup(select) {
	var dateDebut = select.options[select.selectedIndex].value;
	var dateLimite = select.options[select.options.length - 1].value;
	var select2 = document.getElementById("promotionSup");

	console.log(dateDebut, dateLimite);

	for (var i = dateDebut; i<=dateLimite; i++) {
		console.log(i);
		var option = document.createElement('option');
		option.value = i;
		option.innerHTML = i;
		select2.appendChild(option);
	}
}



/*function selection()
    {
        var selectItem = document.getElementById("promotionInf");
           selectItem.onchange = adaptationSup(selectItem);
    }
*/

    /*function adaptationSup(selectItem)
    {
        var dateDebut;

        if(selectItem.options[selectItem.selectedIndex].value == ''){dateDebut = selectItem.options[selectItem.options.length-1].value}
        else{dateDebut = selectItem.options[selectItem.selectedIndex].value;}

        var dateLimite = selectItem.options[1].value;
        var selectItem2 = document.getElementById("promotionSup");

        //On supprime d'abord tous les éléments existants
        var l = selectItem2.options.length;
        for (var j = (l-1); j >= 0; j--) {
          selectItem2.removeChild(selectItem2.options[j]);
        }

        //Ensuite, on remet les dates cohérantes
        var vide = document.createElement('option');
          vide.value = '';
          vide.innerHTML = '';
          selectItem2.appendChild(vide);
       for (var i = dateDebut; i<=dateLimite; i++){
          var option = document.createElement('option');
          option.value = i;
          option.innerHTML = i;
          selectItem2.appendChild(option);
       }
      }*/
