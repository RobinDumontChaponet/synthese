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
	{key:'nomUsage', value:'Nom d\'usage'},
	{key:'nomPat', value:'Nom'},
	{key:'prenom', value:'Prénom'},
	{key:'dateNais', value:'Date de naissance'},
	{key:'codePost', value:'Code postal'},
	{key:'ville', value:'Ville'},
	{key:'pays', value:'Pays'},
	{key:'mail', value:'e-mail'},
	{key:'telMob', value:'Téléphone mobile'},
	{key:'telFix', value:'Téléphone fixe'},
	{key:'sexe', value:'Sexe'},
	{key:'adresse1', value:'Adresse 1'},
	{key:'adresse2', value:'Adresse 2'},
	{key:'diplomePostDUT', value:'Diplôme Post DUT'},
	{key:'formationPostDUT', value:'Formation Post DUT'},
	{key:'formationEnCours', value:'Formation en cours'},
	{key:'situation', value:'Situation actuelle'},
	{key:'entreprise', value:'Entreprise'},
	{key:'fonction', value:'Fonction'},
	{key:'ecole', value:'École'},
	{key:'piplômePrepare', value:'Diplôme préparé'},
	{key:'TelEntreprise', value:'Téléphone Entreprise'},
	{key:'reponse', value:'Réponse'}
];



csvColName.sort(function(a, b) {
	return a.value.localeCompare(b.value);
});

//var csvColName = { 'nomUsage':'Nom d\'usage', 'nomPat':'Nom patronymique', 'prenom':'Prénom', 'dateNais':'Date de naissance', 'adresse':'Adresse postale', 'codePost':'Code postal', 'ville':'Ville', 'pays':'Pays', 'mail':'Adresse e-mail', 'telMob':'Téléphone mobile', 'telFix':'Téléphone fixe' };


function csvArrayToTable(array) {
	var headers=Array();
	for(var i=0, l=array[0].length; i<l; i++) {
		var select = '<select name="'+i+'"><option value="" disabled selected style="display:none;">Type</option><option value="unused" class="unusedOption"> (Inutilisé)</option>';
		for(var k=0, ll=csvColName.length; k<ll; k++)
			select += '<option value="'+csvColName[k].key+'">'+csvColName[k].value+'</option>';
		headers.push(select);
	}
	return arrayToTable(array, headers);
}