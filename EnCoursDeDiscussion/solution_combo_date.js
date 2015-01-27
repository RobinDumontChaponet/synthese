window.onload = function() { selection(); }

    function selection()
    {
       
        var selectItem = document.getElementById("promotionInf");
        selectItem.onchange = adaptationSup(selectItem);
    }
    
    
    function adaptationSup(selectItem)
    {
        var dateDebut = selectItem.options[selectItem.selectedIndex].value;
        var dateLimite = selectItem.options[selectItem.options.length - 1].value;
        var selectItem2 = document.getElementById("promotionSup");
  
       for (var i = dateDebut; i<=dateLimite; i++){
          var option = document.createElement('option');
          option.value = i;
          option.innerHTML = i;
          selectItem2.appendChild(option);
      }
          
    }
