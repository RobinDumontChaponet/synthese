<!--meta title="Importer promo .csv" css="style/csv.css" js="script/tabulars.transit.js" js="script/uploadCSV.js"-->
<div id="content">
  <div id="file">
  	<fieldset id="add" class="button">
  		<label>Sélectionnez un fichier .CSV</label> <input type="file" id="fileinput" name="file"> <img src="style/images/loader.gif" alt="chargement...">
	</fieldset><!--<label for="delimiterSelect">Délimiteur</label>
	<select name="delimiter" id="delimiterSelect">
  	  <option value="" disabled selected style="display:none;">Délimiteur</option>
  	  <option selected="selected" value=";">;</option>
  	  <option value=",">,</option>
  	  <option value="|">|</option>
  	  <option value="tab">Tabulation</option>
	</select>-->
	<!--<input id="delimiterInput" type="text" maxlength="1" size="1" name="delimiter" value=";" />-->
  </div>
  <form action="" onsubmit="" method="post" enctype="multipart/form-data" id="csv">
  	<select name="departement">
  	  <option value="" disabled selected style="display:none;">Département</option>
  	  <?php if(!empty($departements)) foreach($departements as $departement) echo '<option value="'.$departement->getId().'">'.$departement->getNom().'</option>';?>
	</select>
  	<select name="promo">
  	  <option value="" disabled selected style="display:none;">Promotion</option>
  	  <?php for($y=date("Y")+1; $y>=1968; $y--) echo '<option value="'.$y.'">'.$y.'</option>';?>
	</select>
	<fieldset id="table">
		<legend>Sélectionnez le type de données en vous référant aux deux premières lignes du fichier ci-dessous</legend>
	</fieldset>
	<input type="submit" value="Aperçu" />
  </form>
</div>
<script type="text/javascript">
new FileTransfert(document.getElementById('fileinput'), 'csv', 'data/csv', '', function (resp) {
	var xhr = new XMLHttpRequest(),
	delimiterSelector, delimiter;
	if(delimiterSelector = document.getElementById("delimiterSelect"))
		delimiter = delimiterSelector.options[delimiterSelector.selectedIndex].value;
	xhr.open('GET', 'helpers/getCSV.php?file='+encodeURI(resp.name)+'&nbLines=2'+((delimiter)?'&delimiter='+delimiter:''), true);

	xhr.onload = function() {
		if(this.readyState  == 4)
			if (this.status == 200) {
				console.log('responseTextARRAYCSV: '+this.responseText);
				var resp = JSON.parse(utf8_decode(this.response));
				document.getElementById('table').appendChild(csvArrayToTable(resp));
				document.forms[0].style.display='block';
				setAnimationState(document.forms[0], 'running');
			}
	};
	xhr.send(null);
});
</script>