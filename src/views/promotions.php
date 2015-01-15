<!--meta title="Promotions" css="style/promotions.css"-->
<div id="content">
	<h1>Promotions</h1>
	<?php if ($_SESSION['user_auth']['write'])
		echo '<a class="add" href="csv-import">Importer une promotion</a>';
	?>
	<section>
		<ul>
<?php foreach ($promotions as $promotion) {
	echo '<li class="promotion"><p>Promotion '.$promotion->getAnnee().'</p> ';
	foreach ($departements as $departement)
		echo '<a href="promotion/'.$promotion->getId().'/'.$departement->getSigle().'" title="Promotion '.$departement->getNom().' année '.$promotion->getAnnee().'">'.$departement->getSigle().'</a>';
	echo '</li>'.PHP_EOL;
}?>
		</ul>
	</section>
</div>