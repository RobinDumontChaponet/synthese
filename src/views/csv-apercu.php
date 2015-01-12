<!--meta title="Importer promo .csv" css="style/csv.css" js="script/tabulars.transit.js" js="script/uploadCSV.js"-->
<div id="content">
<?php if(!empty($output)) { ?>
  <p class="notice">Le fichier .csv contient les erreurs suivantes. Corrigez-les puis validez.</p>
  <form action="" method="post" name="correct">
  	<?php echo $output; ?>
  	<br /><input type="submit" value="Corriger" />
  </form>
<?php
} else {
?>
<section id="resultat">
		<table>
			<thead>
				<tr>
					<th>Nom patronymique</th>
					<th>Nom d'usage</th>
					<th>Prénom</th>
					<th>Date de naissance</th>
					<th>Mail</th>
					<th>Téléphone mobile</th>
					<th>Téléphone fixe</th>
					<th>Adresse 1</th>
					<th>Code postal</th>
					<th>Ville</th>
					<th>Pays</th>
					<th>Diplôme Post DUT</th>
					<th>Formation Post DUT</th>
					<th>Ecole</th>
					<th>Diplôme préparé</th>
					<th>Entreprise</th>
					<th>Téléphone entreprise</th>
					<th>Code postal entreprise</th>
					<th>Cedex</th>
					<th>Adresse 1 parent</th>
					<th>Adresse 2 parent</th>
					<th>Code postal parent</th>
					<th>Téléphone mobile parent</th>
				</tr>
				<tr>
					
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</section>
<?php
}
?>
</div>
<script type="text/javascript">
document.forms[0].style.display='block';
setAnimationState(document.forms[0], 'running');
</script>