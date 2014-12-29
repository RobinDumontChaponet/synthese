var xhr = null;

function link_ajax() {
	xhr = getXMLHttpRequest();
	if((xhr != null) && (xhr != false)) {
		if((xhr.readyState == 0) || (xhr.readyState == 4)) {
			var nom = document.getElementById('nom').value,
			prenom = document.getElementById('prenom').value,
			promotionInf = document.getElementById('promotionInf').value,
			promotionSup = document.getElementById('promotionSup').value,
			diplomeDUT = document.getElementById('diplome').value,
			typeSpecialisation = document.getElementById('typeSpecialisation').value,
			specialisation = document.getElementById('specialisation').value,
			diplomePostDUT = document.getElementById('diplomePostDUT').value,
			etablissementPostDUT = document.getElementById('etabPostDUT').value,
			travailActuel = document.getElementById('travailActuel').checked;

			xhr.open('GET', encodeURI('helpers/search.php?nom='+nom+'&prenom='+prenom+'&promotionInf='+promotionInf+'&promotionSup='+promotionSup+'&diplomeDUT='+diplomeDUT+'&typeSpecialisation='+typeSpecialisation+'&specialisation='+specialisation+'&diplomePostDUT='+diplomePostDUT+'&etablissementPostDUT='+etablissementPostDUT+'&travailActuel='+travailActuel), true);

			console.log('helpers/search.php?nom='+nom+'&prenom='+prenom+'&promotionInf='+promotionInf+'&promotionSup='+promotionSup+'&diplomeDUT='+diplomeDUT+'&typeSpecialisation='+typeSpecialisation+'&specialisation='+specialisation+'&diplomePostDUT='+diplomePostDUT+'&etablissementPostDUT='+etablissementPostDUT+'&travailActuel='+travailActuel);

			xhr.onreadystatechange = affichageResultat;

			xhr.send(null);

		} else
			setTimeout('link_ajax()', 500);
	} else if(xhr == null)
		alert('Erreur ! Désolé pour l\'inconvénient. ;-)');
}

function affichageResultat() {
	if(xhr.readyState == 4)
		if(xhr.status == 200) {
			//console.log(xhr.responseText);
			var resp = JSON.parse(xhr.responseText),
			table = '';
			for(var i=0, l=resp.length; i < l; i++) {
				var it = resp[i];

				table += '<tr>';

				table += '<td>'+it['nom']+'</td>';
				table += '<td>'+it['prenom']+'</td>';
				table += '<td>'+it['promotion']+'</td>';
				table += '<td>'+it['diplomeDUT']+'</td>';
				table += '<td>'+it['typeSpecialisation']+'</td>';
				table += '<td>'+it['specialisation']+'</td>';

				table += '<td>';
				for(var j=0, ll=it['diplomesPostDUT'].length; j < ll; j++)
					table += it['diplomesPostDUT'][j]+' ';
				table += '</td>';

				table += '<td>';
				for(var j=0, ll=it['etablissementsPostDUT'].length; j < ll; j++)
					table += it['etablissementsPostDUT'][j]+' ';
				table += '</td>';

				if(it['travailActuel'])
					table += '<td>'+it['travailActuel']+'</td>';
				else
					table += '<td class="sad">Aucun travail actuellement</td>';

				table += '<td><a href="profil/'+it['idProfil']+'">Consulter</a></td>';

				table += '</tr>';
			}
			table += '</table>';

			document.getElementById('resultat').getElementsByTagName('tbody')[0].innerHTML = table;

		} else
			console.error('le fichier xml ne retourne pas un 200 : '+xhr.status);
}
