var xhr = null;

function link_ajax() {
	xhr = getXMLHttpRequest();
	if((xhr != null) && (xhr != false)) {
		if((xhr.readyState == 0) || (xhr.readyState == 4)) {
			var nom = document.getElementById('nom').value,
			prenom = document.getElementById('prenom').value,
			promotionInf = document.getElementById('promotionInf').value,
			promotionSup = document.getElementById('promotionSup').value,
			diplomedut = document.getElementById('diplome').value,
			typespecialisations = document.getElementById('typeSpecialisation').value,
			specialisation = document.getElementById('specialisation').value,
			diplomepostdut = document.getElementById('diplomePostDUT').value,
			etablissementpostdut = document.getElementById('etabPostDUT').value,
			travail = document.getElementById('travail').value;

			xhr.open('GET', encodeURI('helpers/searchv2.php?nom='+nom+'&prenom='+prenom+'&promotionInf='+promotionInf+'&promotionSup='+promotionSup+'&diplomedut='+diplomedut+'&typesspecialisations='+typespecialisations+'&specialisation='+specialisation+'&diplomepostdut='+diplomepostdut+'&etablissementpostdut='+etablissementpostdut+'&travail='+travail), true);

			xhr.onreadystatechange = affichageResultat;

			xhr.send(null);

		} else
			setTimeout('link_ajax()', 500);
	} else if(xhr == null)
		alert('Erreur ! Désolé pour l\'inconvénient. ;-)');
}

function affichageResultat() {
	if(xhr.readyState == 4) {
		if(xhr.status == 200) {
			//console.log(xhr.responseText);
			xmlresponse = xhr.responseXML;
			root = xmlresponse.documentElement;
			listePersonnes = root.getElementsByTagName('personne');

			table = '<table>';
			table += '<tr> <th>Nom</th> <th>Prenom</th> <th>promotion</th> <th>diplôme DUT</th> <th>Type specialisation</th> <th>Spécialisation</th> <th>Diplôme post-DUT</th> <th>Etablissement</th> <th>Travail</th> <th>Profil</th>  </tr>';
			for(i = 0; i < listePersonnes.length; i++) {
				table += '<tr>';
				for(j = 0; j < listePersonnes[i].childNodes.length; j++) {
					table += '<td>'+listePersonnes[i].childNodes[j].textContent+'</td>';
				}
				table += '</tr>';
			}
			table += '</table>';

			document.getElementById('resultat').innerHTML = table;

			//document.getElementById('resultat').innerHTML = xhr.responseText;

		} else
			console.error('le fichier xml ne retourne pas un 200 : '+xhr.status);
	}
}
