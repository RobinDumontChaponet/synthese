<?php

include_once 'conf.inc.php';

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
			include MODELS_INC.'EstSpecialiseDAO.class.php';
			include MODELS_INC.'PossedeDAO.class.php';
	?>
		<table>
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Diplôme DUT</th>
					<th>Spécialisation</th>
					<th>Diplômes post-DUT</th>
					<th>Travail</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($anciens as $ancien) {
				$estSpecialise = EstSpecialiseDAO::getByAncien($ancien);
				$possede = PossedeDAO::getByAncien($ancien);
				$aEtudie = AEtudieDAO::getByAncien($ancien);
				$travail = TravailleDAO::getByAncien($ancien);
				echo '<tr>';
				echo '<td><a href="profil/'.$ancien->getId().'"><span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span></a></td>';
				echo '<td><a href="profil/'.$ancien->getId().'">'.$ancien->getPrenom().'</a></td>';
				echo '<td>';
				if($aEtudie)
					foreach($aEtudie as $item)
						echo $item->getDiplomeDUT()->getLibelle().'<br />';
				echo '</td>';
				echo '<td>';
				if($estSpecialise)
					foreach($estSpecialise as $item)
						echo $item->getSpecialisation()->getLibelle().' ('.$item->getSpecialisation()->getTypeSpecialisation()->getLibelle().')'.'<br />';
				echo '</td>';
				echo '<td>';
				if($possede)
					foreach($possede as $item)
						echo $item->getDiplomePostDUT()->getLibelle().' à '.$item->getEtablissement()->getNom().'<br />';
				echo '</td>';
				echo '<td>';
				if($travail)
					foreach($travail as $item)
						echo $item->getEntreprise()->getNom().'<br />';
				echo '</td>';
				echo '</tr>';
				}
			?>
			</tbody>
		</table>
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