var xhr = null;

function link_ajax() {
	xhr = getXMLHttpRequest();
	if((xhr != null) && (xhr != false)) {
		if((xhr.readyState == 0) || (xhr.readyState == 4)) {
			var nom = document.getElementById('nom').value,
			prenom = document.getElementById('prenom').value,
			promotion = document.getElementById('promotion').value,
			diplomedut = document.getElementById('diplome').value,
			typespecialisations = document.getElementById('typeSpecialisation').value,
			specialisation = document.getElementById('specialisation').value,
			diplomepostdut = document.getElementById('diplomePostDUT').value,
			etablissementpostdut = document.getElementById('etabPostDUT').value,
			travailactuel = document.getElementById('travailActuel').value;

			xhr.open('GET', 'helpers/search.php?nom='+nom+'&prenom='+prenom+'&promotion='+promotion+'&diplomedut='+diplomedut+'&typesspecialisations='+typespecialisations+'&specialisation='+specialisation+'&diplomepostdut='+diplomepostdut+'&etablissementpostdut='+etablissementpostdut+'&travailactuel='+travailactuel, true);

			xhr.onreadystatechange = affichageResultat;

			xhr.send(null);

		} else
			setTimeout('link_ajax()', 1000);
	} else if(xhr == null)
		alert('Erreur AJAX ! Object xmlhttprequest a pour valeur FALSE ou NULL !');
}

function affichageResultat() {
    if(xhr.readyState == 4) {
        if(xhr.status == 200) {
			xmlresponse = xhr.responseXML;
			console.log(xmlresponse);
			/*root = xmlresponse.documentElement;
			listePersonnes = root.getElementsByTagName('personne');

			table = '<table border="1">';
			table += '<tr> <th>Nom</th> <th>Prenom</th> <th>promotion</th> <th>diplôme DUT</th> <th>Type specialisation</th> <th>Spécialisation</th> <th>Diplôme post-DUT</th> <th>Etablissement</th> <th>Travail actuel</th>  </tr>';
			for(i = 0; i < listePersonnes.length; i++) {
				table += '<tr>';
				for(j = 0; j < listePersonnes[i].childNodes.length; j++) {
					table += '<td>'+listePersonnes[i].childNodes[j].textContent+'</td>';
				}
				table += '</tr>';
			}
			table += '</table>';

			document.getElementById('resultat').innerHTML = table;*/

		} else {
			console.error('le fichier xml ne retourne pas un 200');
		}
	}
}




