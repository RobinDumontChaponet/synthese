<!--meta title="<?= ($promo!=null)?'Promotion '.$dept->getNom().' '.$promo->getAnnee():'La promotion n‘existe pas';?>" css="style/promotions.css" js="script/view.transit.js"-->
<div id="content">
	<?php if($promo!=null) { ?>
	<h1>Promotion <?php echo $dept->getNom().' année '.$promo->getAnnee();?></h1>
	<section>
		<p>Il y a <strong><?= count($anciens); if (count($anciens) > 1) echo ' anciens'; else echo ' ancien';?></strong> en <strong><?= $dept->getNom();?></strong> dans cette promotion.</p>
	</section>
	<section id="etudiants">
		<nav id="viewType">
			<span>Affichage :</span>
			<button class="magnetView active" title="Vue condensée" data-view="magnet">Vue condensée</button>
			<button class="tableView" title="Vue en tableau" data-view="table">Vue en tableau</button>
			<button class="listView" title="Vue en liste" data-view="list">Vue en liste</button>
		</nav>
		<h2>Étudiants de la promotion</h2>
		<?php if($anciens != NULL) { ?>
		<div id="viewContent">
			<ul class="magnets">
				<?php foreach($anciens as $ancien)
					echo '<li><a href="profil/'.$ancien->getId().'">'.$ancien->getPrenom().'<span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span></a></li>';
				?>
			</ul>
		</div>
		<?php
		} else {
			echo '<p class="sad">Il n\'y a pas d\'étudiants dans cette promotion</p>';
		}
	} else { ?>
		<p class="warning">La promotion n'existe pas</p>
	<?php
	}
	?>
	</section>
</div>
<script>

var viewChanger = new ViewChanger(document.getElementById('viewType'), document.getElementById('viewContent'), 'helpers/promotion.php?id=<?= $promo->getId() ?>&dep=<?=$dept->getSigle() ?>', function(resp) {
	//console.log('callBack', resp);
	this.content.innerHTML=resp;
});
viewChanger.init();
</script>