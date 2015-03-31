var currentPage;
var checkAll = false;
var checkOnes = new Array();
var nonCheckedOnes = new Array();
var defaultCheck;
function link_ajax(page) {
	page = isNaN(page) ? 0 : page;
	currentPage = page;

    var xhr = getXMLHttpRequest();

	if ((xhr != null) && (xhr != false)) {
		if (xhr.readyState == 0 || xhr.readyState == 4) {
			var form = document.forms['search'],
				elements = form.elements;
			var args = form2args(elements);
			args += '&page=' + page;
			xhr.open(form.method, 'helpers/search.php' + args, true);
			xhr.onreadystatechange = affichageResultat;
			xhr.send(null);
		} else setTimeout('link_ajax()', 500);
	} else if (xhr == null) alert('Erreur ! Désolé pour l\'inconvénient. ;-)');
}

function affichageResultat() {
	if (this.readyState == 4) if (this.status == 200) {
		//console.log(this.responseText);

        var lastEtab, lastPostDut;




	var resp   = JSON.parse(this.responseText),
		data   = resp['data'],
		table  = '';

        selectAll();

	for (var i = 0, l = data.length; i < l; i++) {

            var it = data[i];

            if (!checkAll) {
                if (checkOnes.indexOf(parseInt(it['idProfil'])) != -1)
                    defaultCheck = 'checked';
                else
                    defaultCheck = '';
            }

			table += '<tr>';
			table += '<td><input type="checkbox" value="' + it['idProfil'] + '" name="selectionne[]" form="send_message" '+defaultCheck+' onclick="updateDestList(this, '+it['idProfil']+');" /></td>';
			table += '<td class="nomPatronymique">' + it['nom'] + '</td>';
			table += '<td>' + it['prenom'] + '</td>';
			table += '<td>' + it['promotion'] + '</td>';
			table += '<td>' + it['diplomeDUT'] + '</td>';
			table += '<td>' + it['typeSpecialisation'] + '</td>';
			table += '<td>' + it['specialisation'] + '</td>';
			table += '<td>';
            lastPostDut = it['diplomesPostDUT'].length - 1;
            table += (it['diplomesPostDUT'][lastPostDut] == null)?' ':it['diplomesPostDUT'][lastPostDut];
			table += '</td>';
			table += '<td>';
            lastEtab = it['etablissementsPostDUT'].length -1;
			table += (it['etablissementsPostDUT'][lastEtab] == null)?' ':it['etablissementsPostDUT'][lastEtab];
			table += '</td>';
			if (it['travailActuel'])
				table += '<td>' + it['travailActuel'] + '</td>';
			else
				table += '<td class="sad">Aucun travail actuellement</td>';
			table += '<td><a href="profil/' + it['idProfil'] + '">Consulter</a></td>';
			table += '</tr>';
		}
		table += '</table>';
		document.getElementById('resultat').getElementsByTagName('tbody')[0].innerHTML = table;
		var pagesCount = resp['pagesCount'];
		linksPage = '';
		linksPage = '<button'+(!((currentPage>0 && pagesCount>1))?' disabled="disabled"':'')+' onclick="link_ajax('+(currentPage-1)+')"><</button>';

		for (var i = 0; i < pagesCount; i++)
			linksPage += '<button'+((i==currentPage)?' class="active"':'')+' onclick="link_ajax(' + i + ')">' + (i + 1) + '</button>';

		linksPage += '<button'+((currentPage >= i-1)?' disabled="disabled"':'')+' onclick="link_ajax(' + (currentPage + 1) + ')">></button>';
		document.getElementsByClassName('pagination')[0].innerHTML = linksPage;
		// Si jamais on veux mettre en haut et en bas_
		//document.getElementsByClassName('pagination')[1].innerHTML = linksPage;
	} else console.log('Helper retourne code : ' + this.status);
}

function init_search() {
	link_ajax();
	var form = document.forms['search'],
		elements = form.elements;
	for (var i = 0, l = elements.length; i < l; i++) {
		var el = elements[i];
		if (el.tagName.toLowerCase() == 'select' || (el.tagName.toLowerCase() == 'input' && el.type == 'checkbox')) el.onchange = link_ajax;
		else el.onkeyup = link_ajax;
	}
}


function decocherAutre(indicater) {

    if(indicater == 0)
        document.getElementById('NtravailActuel').checked = false;
    else
        document.getElementById('travailActuel').checked = false;
}

function selectAll() {
    var checkbox = document.getElementById("selectAll");

    if (checkbox.checked) {
        checkAll = true;
        defaultCheck = 'checked';
        revalidateChecks(true);
        document.getElementById('infosCheck').value = 1+'-';
    } else {
        checkAll = false;
        revalidateChecks(false);
    }



}

function revalidateChecks(makeChecked) {
    var currentPageRows = document.getElementsByTagName("tr");
    for (var i = 1, l = currentPageRows.length; i < l; i++) {
        currentPageRows[i].getElementsByTagName('td')[0].getElementsByTagName('input')[0].checked = makeChecked;
    }
}

function updateDestList(checkBox, idSelectionne) {

    if (checkAll && !checkBox.checked) {
        addNonChecked(idSelectionne);
    } else if (checkAll && checkBox.checked) {
        removeNonChecked(idSelectionne);
    } else if (checkBox.checked) {
        checkOnes.push(idSelectionne);
        document.getElementById('infosCheck').value = 0+'-';
        updateChecked();

    } else if (!checkBox.checked) {
        document.getElementById('infosCheck').value = 0+'-';
        var index = checkOnes.indexOf(idSelectionne);
        checkOnes.splice(index, 1);
        updateChecked();
    }


}


function addNonChecked(idSelectionne) {
    nonCheckedOnes.push(idSelectionne);
    document.getElementById('infosCheck').value = 1+'-';
    for (var i = 0, l = nonCheckedOnes.length; i < l; i++)
        document.getElementById('infosCheck').value += nonCheckedOnes[i]+'-';
}


function removeNonChecked(idSelectionne) {
    var index = nonCheckedOnes.indexOf(idSelectionne);
    nonCheckedOnes.splice(index, 1);

    document.getElementById('infosCheck').value = 1+'-';
    for (var i = 0, l = nonCheckedOnes.length; i < l; i++)
        document.getElementById('infosCheck').value += nonCheckedOnes[i]+'-';
}


function updateChecked() {
    for (var i = 0, l = checkOnes.length; i < l; i++)
        document.getElementById('infosCheck').value += checkOnes[i]+'-';
}
