<?php

include 'conf.inc.php';

include_once MODELS_INC.'PromotionDAO.class.php';
include_once MODELS_INC.'DepartementIUTDAO.class.php';
include_once MODELS_INC.'AncienDAO.class.php';

if (isset($_GET['id']) && isset($_GET['dep'])) {
	$promo = PromotionDAO::getById($_GET['id']);
    $dept=DepartementIUTDAO::getBySigle($_GET['dep']);
	$anciens = AncienDAO::getAncienByIdPromoAndIdDep($_GET['id'],$dept->getId());
}

if($promo!=null) { ?>
	<?php if($anciens != NULL) {
		if($_GET['view']=='magnet') { ?>
	<ul id="viewContent" class="magnets">
		<?php foreach($anciens as $ancien)
			echo '<li><a href="profil/'.$ancien->getId().'">'.$ancien->getPrenom().'<span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span></a></li>';
		?>
	</ul>
	<?php
		} elseif($_GET['view']=='table') {
	?>
		table
	<?php
		} else {
	?>
	<ul id="viewContent" class="list">
		<?php foreach($anciens as $ancien) {
			echo '<li>';
			if($ancien->getImageTrombi()!=null)
				echo '<img alt="Image du trombinoscope" src="data:image/png;base64,'.base64_encode($ancien->getImageTrombi()).'" />';
			else
				echo '<img alt="Pas d\'image du trombinoscope" src="style/images/nobody.png" />';
			echo '<h3>'.$ancien->getPrenom().'<span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span></h3>';
			echo '<p>truc truc truc truc truc truc truc truc truc truc truc truc truc truc truc truc.</p>';
			echo '</li>';
		}
		?>
	</ul>
	<?php
		}
	} else {
		echo '<p class="sad">Il n\'y a pas d\'étudiants dans cette promotion</p>';
	}
} else { ?>
	<p class="warning">La promotion n'existe pas</p>
<?php
}
?>