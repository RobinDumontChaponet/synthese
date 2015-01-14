var g_page;
function link_ajax(page) {



    if(typeof(page) == 'object')
    {
        g_page = 0;
    }else{
        g_page = page;
    }

	var xhr = getXMLHttpRequest();
	page = isNaN(page)?0:page;
	if((xhr != null) && (xhr != false)) {
		if(xhr.readyState == 0 || xhr.readyState == 4) {
			var form=document.forms['search'],
			elements=form.elements;

			var args = form2args (elements);

			args += '&page='+page;

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
			//console.log(this.responseText);
			var resp = JSON.parse(this.responseText),
			data = resp['data'],
			table = '';

			for(var i=0, l=data.length; i < l; i++) {
				var it = data[i];

				table += '<tr>';

				table += '<td><input type="checkbox" value="'+it['idProfil']+'" name="selectionne" /></td>';
				table += '<td class="nomPatronymique">'+it['nom']+'</td>';
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

			var pagesCount = resp['pagesCount'];

			linksPage = '';
			if((g_page > 0) && (pagesCount > 1))
			{
				linksPage = '<button onclick="link_ajax('+(g_page-1)+')"><</button>';
			}
			var i;
			for(i=0; i < pagesCount; i++)
				linksPage += '<button onclick="link_ajax('+i+')">'+(i+1)+'</button>';


			
			// Si jamais on veux mettre en haut et en bas_
			//document.getElementsByClassName('pagination')[1].innerHTML = linksPage;
			
			if(g_page < (i-1))
			{
				linksPage += '<button onclick="link_ajax('+(g_page+1)+')">></button>';
			}else if(!g_page)
            {
                g_page = pagesCount;
                if(g_page > 1)
                {
                    linksPage += '<button onclick="link_ajax('+1+')">></button>';
                }
            }

			
			
			document.getElementsByClassName('pagination')[0].innerHTML = linksPage;

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
