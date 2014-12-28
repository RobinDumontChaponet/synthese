<!--meta title="Promotions" css="style/animations.css" css="style/promotions.css"-->
<div id="content">
  <h1>Promotions</h1>
  <ul>
<?php foreach ($promotions as $promotion) {
	echo '	  <li><a href="promotion/'.$promotion->getId().'" title="Promotion '.$promotion->getAnnee().'">Promotion '.$promotion->getAnnee().'</a>';
	foreach ($departements as $departement)
		echo '<a href="promotion/'.$promotion->getId().'/'.$departement->getSigle().'" title="Promotion '.$departement->getNom().' année '.$promotion->getAnnee().'">'.$departement->getSigle().'</a>';
	echo '</li>'.PHP_EOL;
}?>
  </ul>
</div>