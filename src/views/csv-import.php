<!--meta title="IUTbook | Importer promo .csv" css="style/csv.css" js="script/uploadCSV.js"-->
<section id="content">
  <div id="file">
  	<fieldset id="add" class="button">
  		<label>Sélectionnez un fichier .CSV</label> <input type="file" id="fileinput" name="file"> <img src="style/images/loader.gif" alt="chargement...">
	</fieldset>
  </div>
  <form action="" onsubmit="" method="post" enctype="multipart/form-data" id="csv">
  	<select name="departement">
  	  <option value="" disabled selected style="display:none;">Département</option>
  	  <?php if(!empty($departements)) foreach($departements as $departement) echo '<option value="'.$departement->getNom().'"></option>';?>
	</select>
  	<select name="promo">
  	  <option value="" disabled selected style="display:none;">Promotion</option>
  	  <?php for($y=date("Y")+1; $y>=1967; $y--) echo '<option value="'.$y.'">'.$y.' - '.($y+2).'</option>';?>
	</select>
	<p>Sélectionnez le type de données en vous référant à la première ligne du fichier ci-dessous</p>
	<fieldset id="table"></fieldset>
	<input type="submit" value="Enregistrer" />
  </form>
</section>
<script type="text/javascript">
new FileTransfert(document.getElementById('fileinput'), 'csv', 'data/csv', '', function (resp) {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'helpers/getCSV.php?file='+encodeURI(resp.name)+'&nbLines=1', true);

	xhr.onload = function() {
		if(this.readyState  == 4)
			if (this.status == 200) {
				var resp = JSON.parse(this.response);
				document.getElementById('table').appendChild(csvArrayToTable(resp));
				document.forms[0].style.opacity=1;
				//console.log('responseTextARRAYCSV: '+this.responseText);
			}
	};
	xhr.send(null);
});
</script>