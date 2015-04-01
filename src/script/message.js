var xhr;
var choisis = new Array();
function link_ajax() {
    /*
    *Instanciation de l'objet XMLHTTP
    *Prise en compte : explorer, gestion <6 et >6
    */
    if (window.ActiveXObject) {
        try {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        }
    } else if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        alert("Vous devez activer JAVASCRIPT");
    }
    
    /*
    * 1 - Envoie de la requete en fonction de ce qui est ecrit dans destinataire
    * 2 - affichage du resultat
    */
    if ((xhr != null) && (xhr != false)) {
        if ((xhr.readyState == 0) || (xhr.readyState == 4)) {
            //Get destinataire
            
            var ignoredTextSize = (getImportantText().length == 0)?0:getImportantText().length + 2; // +2 pour le ; et le \s
            var args = document.getElementById("destinataire").value.substr(ignoredTextSize);
            var destinataire = "dest="+args;
            xhr.open("GET", "helpers/message.php?"+destinataire, true);
            xhr.onreadystatechange = afficherSuggestions;
            xhr.send(null);
        } 
    }
}


function afficherSuggestions() {
    if ((xhr.readyState == 4) && (xhr.status == 200)) {
        var ancienText = getImportantText();
        
        
        var etudiants = JSON.parse(xhr.responseText);
        var liste = new Array();
        for (var i = 0, l = etudiants.length; i < l; i++) {
                liste[i] = etudiants[i]["nom"]+" "+etudiants[i]["prenom"];
        }
        
        
        
        $("#destinataire").autocomplete({
            minLength : 1,
            delay : 0,
            
            source : function(request, response) {
                response( $.ui.autocomplete.filter(
                liste, getDerniereRecherche(request.term) ) );
            },
            
            focus : function(event, ui) {
                return null;
            },
            select : function(event, ui) {
                event.preventDefault();
                $("#destinataire").val(ancienText+ui.item.label+"; ");
                document.getElementById("chosen").value += etudiants[liste.indexOf(ui.item.label)]["id"]+"-";
                return null;
            },
            
        });
        
    }
}


function getDerniereRecherche(ensembleMots) {
    var listeMots = ensembleMots.split(/;\s*/);
    return listeMots.pop();
}

function getImportantText() {
    var validTextExpression = /^[a-zA-Z]+\s[a-zA-Z]+/;
    
    var nonTreatedText = document.getElementById("destinataire").value;
    var nonTreatedTextParts = nonTreatedText.split("; ");
    var treatedText = "";
    
    for (var i = 0, l = nonTreatedTextParts.length; i < l; i++)
        if (nonTreatedTextParts[i].match(validTextExpression))
            treatedText += nonTreatedTextParts[i]+"; ";
    
    
    return treatedText;
}

                               

function init_message() {
    //Preparation des evenements
	document.getElementById("destinataire").onkeyup = link_ajax;
}
