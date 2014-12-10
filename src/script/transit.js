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

var csvColName = { 'nomUsage':'Nom d\'usage', 'nomPat':'Nom patronymique', 'prenom':'Prénom', 'dateNais':'Date de naissance', 'adresse':'Adresse postale', 'codePost':'Code postal', 'ville':'Ville', 'pays':'Pays', 'mail':'Adresse e-mail', 'telMob':'Téléphone mobile', 'telFix':'Téléphone fixe' };

function csvArrayToTable(array) {
	var headers=Array();
	for(var i=0, l=array[0].length; i<l; i++) {

		var select = '<select name="col'+i+'"><option value="" disabled selected style="display:none;">Type</option><option value="unused" class="unusedOption"> (Inutilisé)</option>';
		for(var key in csvColName)
			select += '<option value="'+key+'">'+csvColName[key]+'</option>';
			headers.push(select);
	}
	return arrayToTable(array, headers);
}