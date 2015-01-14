<!--meta title="Importer promo .csv" css="style/csv.css" js="script/tabulars.transit.js" js="script/uploadCSV.js"-->
<div id="content">
<?php if(!empty($output)) { ?>
  <p class="notice">Le fichier .csv contient les erreurs suivantes. Corrigez-les puis validez.</p>
  <form action="index.php?requ=csv-import&<?php echo http_build_query($order);?>" method="post" name="correct">
  	<?php echo $output; ?>
  	<br /><input type="submit" name="submitCorrect" value="Corriger" />
  </form>
<?php
} else {
?>
		<table style="position: static">
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
					<th>Code postal parent</th>
					<th>Téléphone mobile parent</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach($csv as $line) {
					if ($i > 2)
						break;
					else {
							echo '<tr>';
							echo '<td>'.$line[$order['nomPat']].'</td>';
							echo '<td>'.$line[$order['nomUsage']].'</td>';
							echo '<td>'.$line[$order['prenom']].'</td>';
							echo '<td>'.$line[$order['dateNais']].'</td>';
							echo '<td>'.$line[$order['mail']].'</td>';
							echo '<td>'.$line[$order['telMob']].'</td>';
							echo '<td>'.$line[$order['telFix']].'</td>';
							echo '<td>'.$line[$order['adresse1']].'</td>';
							echo '<td>'.$line[$order['codePost']].'</td>';
							echo '<td>'.$line[$order['ville']].'</td>';
							echo '<td>'.$line[$order['pays']].'</td>';
							echo '<td>'.$line[$order['diplomePostDUT']].'</td>';
							echo '<td>'.$line[$order['formationPostDUT']].'</td>';
							echo '<td>'.$line[$order['ecole']].'</td>';
							echo '<td>'.$line[$order['diplomePrepare']].'</td>';
							echo '<td>'.$line[$order['entreprise']].'</td>';
							echo '<td>'.$line[$order['telEntreprise']].'</td>';
							echo '<td>'.$line[$order['codePostEntreprise']].'</td>';
							echo '<td>'.$line[$order['cedex']].'</td>';
							echo '<td>'.$line[$order['adresse1Parents']].'</td>';
							echo '<td>'.$line[$order['codePostParents']].'</td>';
							echo '<td>'.$line[$order['telMobParents']].'</td>';
							echo '</tr>';
					}
					$i++;
				}
				?>
			</tbody>
		</table>
	<form action="index.php?requ=csv-import&<?php echo http_build_query($order);?>" method="post" name="final">
	  <input type="submit" name="submitFinal" value="Importer" />
  </form>
<?php
}
?>
</div>
<script type="text/javascript">
document.forms[0].style.display='block';
setAnimationState(document.forms[0], 'running');
</script>