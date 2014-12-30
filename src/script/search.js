function link_ajax() {
	var xhr = getXMLHttpRequest();
	if((xhr != null) && (xhr != false)) {
		if(xhr.readyState == 0 || xhr.readyState == 4) {
			var form=document.forms['search'],
			elements=form.elements;

			var args = form2args (elements);

			xhr.open(form.method, 'helpers/search.php'+args, true);

			xhr.onreadystatechange = affichageResultat;

			xhr.send(null);

		} else
			setTimeout('link_ajax()', 500);
	} else if(xhr == null)
		alert('Erreur ! Désolé pour l\'inconvénient. ;-)');
}

function affichageResultat() {
	if(this.readyState == 4)
		if(this.status == 200) {
			var resp = JSON.parse(this.responseText),
			table = '';
			for(var i=0, l=resp.length; i < l; i++) {
				var it = resp[i];

				table += '<tr>';

				table += '<td><input type="checkbox" value="'+it['idProfil']+'" name="selectionne" /></td>';
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
			console.error('le fichier xml ne retourne pas un 200 : '+this.status);
}

function init_search () {
	link_ajax();
	var form=document.forms['search'],
	elements=form.elements;
	for(var i=0, l=elements.length; i<l; i++) {
		var el=elements[i];
		if (el.tagName.toLowerCase() == 'select' || (el.tagName.toLowerCase()=='input' && el.type=='checkbox'))
			el.onchange=link_ajax;
		else
			el.onkeyup=link_ajax;
	}
}
