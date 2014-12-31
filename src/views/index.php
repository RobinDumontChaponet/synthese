<!--meta title=""-->

<?php
/***************************************************************************************************
 *	- pour ancien : news de sa promo, messages, et les machins de réseau social                    *
 *	- pour prof : les dernières activités/évènements ouverts par lui, messages, et tout le bazar   *
 *	- pour admin : un mélange des deux premiers, en fait... faut réchéflir                         *
 ***************************************************************************************************/
?>

<div id="content">
	<section>
		<h1>Temporairement...</h1>
		<p>Temporairement, ici, quelques liens, tant que l'on ne gère pas encore tout à fait les permissions.</p>
		<ul>
			<li><a href="csv-import" title="Importation .csv" data-help="Par ici !">importation .csv</a></li>
		</ul>
	</section>
<?php
if ($libelleTypeProfil == "Admin") {
?>
	<section>
		<h1>Ici des news...</h1>
	</section>
<?php
} elseif ($libelleTypeProfil == "Professeur") {
?>
	<section>
		<a class="all" href="evenements" title="Voir tous les évènements">Tous les évènements...</a>
		<h1>Mes évènements</h1>
		<ul>
			<li></li>
		</ul>
	</section>
	<section>
		<a class="all" href="#" title="Voir tous les messages">Tous les messages...</a>
		<h1>Derniers messages</h1>
		<ul>
			<li></li>
		</ul>
	</section>
<?php
} elseif($libelleTypeProfil == "Ancien") {
?>
	<section>
		<a class="all" href="promotion" title="Voir la page de la promotion">Aller à la promotion...</a>
		<h1>Dernières activités de la promotion</h1>
		<ul>
			<li></li>
		</ul>
	</section>
	<section>
		<a class="all" href="#" title="Voir tous les messages">Tous les messages...</a>
		<h1>Derniers messages</h1>
		<ul>
			<li></li>
		</ul>
	</section>
<?php } ?>
</div>