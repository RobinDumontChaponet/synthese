function arrayToTable(tableData, headers) {
	var table = document.createElement('table'),
	tableHead = document.createElement('thead'),
	tableBody = document.createElement('tbody');
	if (typeof headers !== 'undefined' && headers.length > 0) {
		var row = document.createElement('tr');
		headers.forEach(function(cellData) {
			var cell = document.createElement('th');
			cell.innerHTML=cellData;
			row.appendChild(cell);
		});
		tableHead.appendChild(row);
		table.appendChild(tableHead);
	}
	tableData.forEach(function(rowData) {
		var row = document.createElement('tr');
		rowData.forEach(function(cellData) {
			var cell = document.createElement('td');
			cell.appendChild(document.createTextNode(cellData));
			row.appendChild(cell);
		});
		tableBody.appendChild(row);
	});
	table.appendChild(tableBody);
	return table;
}

var csvColName = [
	{key:'Ancien', value: [
		{key:'nomPat', value:'Nom'},
		{key:'nomUsage', value:'Nom d\'usage'},
		{key:'prenom', value:'Prénom'},
		{key:'dateNais', value:'Date de naissance'},
		{key:'mail', value:'E-mail'},
		{key:'telMob', value:'Téléphone mobile'},
		{key:'telFix', value:'Téléphone fixe'},
		{key:'sexe', value:'Sexe'},
		{key:'adresse1', value:'Adresse 1'},
		{key:'adresse2', value:'Adresse 2'},
		{key:'codePost', value:'Code postal'},
		{key:'ville', value:'Ville'},
		{key:'pays', value:'Pays'},
		{key:'situation', value:'Situation actuelle'}
	]},
	{key:'Formation', value: [
		{key:'diplomePostDUT', value:'Diplôme post-DUT'},
		{key:'formationPostDUT', value:'Formation Post-DUT'},
		{key:'formationEnCours', value:'Formation en cours'},
		{key:'ecole', value:'École'},
		{key:'diplomePrepare', value:'Diplôme préparé'}
	]},
	{key:'Entreprise', value: [
		{key:'entreprise', value:'Raison sociale'},
		{key:'codeAPE', value:'Code APE'},
		{key:'fonction', value:'Fonction'},
		{key:'telEntreprise', value:'Téléphone entreprise'},
		{key:'codePost', value:'Code postal entreprise'},
		{key:'villeEntreprise', value:'Ville entreprise'},
		{key:'paysEntreprise', value:'Pays entreprise'},
		{key:'adresse1Entreprise', value:'Adresse 1 entreprise'},
		{key:'adresse2Entreprise', value:'Adresse 2 entreprise'},
		{key:'cedex', value:'Cedex'}
	]},
	{key:'Parents', value: [
		{key:'adresse1Parents', value:'Adresse 1 parents'},
		{key:'adresse2Parents', value:'Adresse 2 parents'},
		{key:'codePostParents', value:'Code postal parents'},
		{key:'villeParents', value:'Ville parents'},
		{key:'paysParents', value:'Pays parents'},
		{key:'situationParents', value:'Situation actuelle parents'},
		{key:'telMobParents', value:'Téléphone mobile parents'},
		{key:'telFixParents', value:'Téléphone fixe parents'}
	]}/*,
	{key:'reponse', value:'Réponse'}*/
];

csvColName.sort(function(a, b) {
	return a.value.localeCompare(b.value);
});

function csvArrayToTable(array) {
	var headers=Array();
	for(var i=0, l=array[0].length; i<l; i++) {
		var select = '<select name="'+i+'"><option value="" disabled selected style="display:none;">Type</option><option value="unused" class="unusedOption">  (Inutilisé)</option>';
		for(var k=0, ll=csvColName.length; k<ll; k++) {
			if(Array.isArray(csvColName[k].value)) {
				select += '<optgroup label="'+csvColName[k].key+'">';
				for(var m=0, lll=csvColName[k].value.length; m<lll; m++)
					select += '<option value="'+csvColName[k].value[m].key+'">'+csvColName[k].value[m].value+'</option>';
				select += '</optgroup>';
			} else
				select += '<option value="'+csvColName[k].key+'">'+csvColName[k].value+'</option>';
		}
		headers.push(select);
	}
	return arrayToTable(array, headers);
}
