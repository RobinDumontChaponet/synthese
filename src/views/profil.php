<!--meta title="<?php if ($ancien != NULL){echo 'Profil de '.$ancien->getNomPatronymique().$ancien->getPrenom();} else {echo 'Profil non trouvé';}?>" css="style/profil.css" js="script/utils.transit.js" js="script/upload-img.js"-->
<div id="content">
<?php
if (isset($ancien) && $ancien != NULL) {?>
	<figure>
		<figcaption>Trombinoscope</figcaption>
		<?php
		if ($imageTrombi != NULL)	//	Si il y a une image de trombi
			echo '<img id="trombiImg" src="helpers/imageTrombi.php?id='.$ancien->getId().'" alt="Image de trombinoscope" />';
		else
			echo '<img id="trombiImg" src="style/images/nobody.png" alt="Pas d\'image de trombinoscope" />';
		?>
		<?php if($_SESSION["syntheseUser"]->getTypeProfil()->getLibelle()=="Admin") { ?>
		<p class="button">
			<label>Importer une image...</label> <input type="file" id="trombiInput" name="file" accept="image/*"> <img src="style/images/loader.gif" alt="chargement..." />
		</p>
		<?php } ?>
	</figure>
	<figure>
		<figcaption>Image de Profil</figcaption>
		<?php if ($imageProfil != NULL)	//	Si il y a une image de profil
			echo '<img id="profilImg" src="helpers/imageProfil.php?id='.$ancien->getId().'" alt="Image de profil" />';
		else
			echo '<img id="profilImg" src="style/images/nobody.png" alt="Pas d\'image de profil" />';
		?>
		<?php if(isset($ancien) && $ancien != NULL && ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])) { ?>
		<p class="button">
			<label>Importer une image...</label> <input type="file" id="profilInput" name="file" accept="image/*"> <img src="style/images/loader.gif" alt="chargement..." />
		</p>
		<?php } ?>
	</figure>

	<h1><?php echo $ancien->getPrenom()?> <span class="nomPatronymique"><?php echo $ancien->getNomPatronymique() ?></span>
	<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
		echo '<a class="edit" href="profil-editer/'.$ancien->getId().'" title="Éditer le profil...">Éditer...</a>';
	?></h1>
	<section id="info"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuProfil"';?>>
		<h2>Informations générales</h2>
		<dl>
			<dt id="nomUsage">Nom d'usage</dt>
			<dd><?php echo ucfirst(strtolower($ancien->getNom()));?></dd>
			<dt id="sexe<?php echo strtoupper($ancien->getSexe());?>">Sexe</dt>
			<dd><?php echo ($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe');?></dd>
			<dt id="dateNaissance">Date de naissance</dt>
			<dd><?php if ($ancien->getDateNaissance() != '0000-00-00') echo $ancien->getDateNaissance();?></dd>
			<dt id="adresse1">Adresse 1</dt>
			<dd><?php echo ucfirst(strtolower($ancien->getAdresse1()));?></dd>
			<dt id="adresse2">Adresse 2</dt>
			<dd><?php echo ucfirst(strtolower($ancien->getAdresse2()));?></dd>
			<dt id="codePostal">Code postal</dt>
			<dd><?php echo $ancien->getCodePostal();?></dd>
			<dt id="ville">Ville</dt>
			<dd><?php echo ucfirst(strtolower($ancien->getVille()));?></dd>
			<dt id="pays">Pays</dt>
			<dd><?php echo ucfirst(strtolower($ancien->getPays())); ?></dd>
			<dt id="telephoneFixe">Telephone</dt>
			<dd><a href="tel:<?php echo $ancien->getTelephone();?>"><?php echo $ancien->getTelephone();?></a></dd>
			<dt id="telephoneMobile">Mobile</dt>
			<dd><a href="tel:<?php echo $ancien->getMobile();?>"><?php echo $ancien->getMobile();?></a></dd>
			<dt id="mail">Mail</dt>
			<dd><a href="mailto:<?php echo $ancien->getMail();?>"><?php echo $ancien->getMail();?></a></dd>

		</dl>
	</section>
    <?php if($ancien->getParents()!=NULL && ($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getTypeProfil()->getId()==2)){
    ?>
    <section id="parents"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuParents"';?>>
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
				echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#parents" title="Éditer le profil...">Éditer...</a>';
		?>
			<h2>Parents</h2>
			<ul>
				<li>
					<dl>
						<dt id="adresse1">Adresse 1</dt>
						<dd><?php echo $ancien->getParents()->getAdresse1();?></dd>
						<dt id="adresse2">Adresse 2</dt>
						<dd><?php echo $ancien->getParents()->getAdresse2();?></dd>
						<dt id="codePostal">Code postal</dt>
						<dd><?php echo $ancien->getParents()->getCodePostal();?></dd>
						<dt id="ville">Ville</dt>
						<dd><?php echo $ancien->getParents()->getVille();?></dd>
						<dt id="pays">Pays</dt>
						<dd><?php echo $ancien->getParents()->getPays(); ?></dd>
						<dt id="telephoneFixe">Telephone</dt>
						<dd><a href="tel:<?php echo $ancien->getParents()->getTelephone();?>"><?php echo $ancien->getParents()->getTelephone();?></a></dd>
						<dt id="telephoneMobile">Mobile</dt>
						<dd><a href="tel:<?php echo $ancien->getParents()->getMobile();?>"><?php echo $ancien->getParents()->getMobile();?></a></dd>
					</dl>
				</li>
			</ul>
	</section>
    <?php
	}
    ?>
	<section id="diplomes"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuDiplomes"';?>>
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#diplomes" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Diplômes</h2>
<?php
	if ($diplomesDUT != NULL) { // Ne peut être modifié, fixe et normalement présent
		echo '<ul>';
			foreach ($diplomesDUT as $diplomeDUT) { ?>
				<li>
					<h3 class="diplome"><?php echo $diplomeDUT->getDiplomeDUT()->getLibelle();?></h3>
					<dl>
						<dt class="departement">Département</dt>
						<dd><?php echo $diplomeDUT->getDepartementIUT()->getNom();?></dd>
						<dt class="promotion">Promotion</dt>
						<dd><?php echo $diplomeDUT->getPromotion()->getAnnee();?></dd>
					</dl>
				</li>
	<?php	}
			if($_SESSION['user_auth']['write']) { ?>
				<li>
					<a class="add" href="diplomeDUT-selectionner/<?php echo $ancien->getId();?>">Ajouter un nouveau diplôme DUT</a>
				</li>
	<?php 	}
		echo '</ul>';
	} ?>
	</section>
	<section id="diplomesPostDUT"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuDiplomes"';?>>
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#diplomesPostDUT" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Diplômes post-DUT</h2>
		<ul>
	<?php if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($diplomesPost as $diplomePost) {
?>
			<li>
				<span class="date">de <?php echo substr($diplomePost->getDateDebut(), 0, 4);?> à <?php echo substr($diplomePost->getDateFin(), 0, 4);?></span>
				<h3 class="diplome"><a href="diplome/<?php echo $diplomePost->getDiplomePostDUT()->getId();?>"><?php echo $diplomePost->getDiplomePostDUT()->getLibelle();?></a> (<?php echo $diplomePost->getDiplomePostDUT()->getDomaine()->getLibelle();?>)</h3>
				<dl>
					<dt class="etablissement">Établissement</dt>
					<dd><a href="etablissement/<?php echo $diplomePost->getEtablissement()->getId();?>"><?php echo $diplomePost->getEtablissement()->getNom();?></a></dd>
				<?php if($diplomePost->getResultat()!=null) {?>
					<dt class="resultat">Résultat</dt>
					<dd><?php echo $diplomePost->getResultat();?></dd>
				<?php } ?>
				</dl>
			</li>
<?php
		}
	}
		if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) { ?>
			<li>
				<a class="add" href="diplome-selectionner/<?php echo $ancien->getId();?>">Ajouter un nouveau diplôme post-DUT</a>
			</li>
		<?php } ?>
		</ul>
<?php if($diplomesPost == NULL) { ?>
		<p class="sad">Aucun diplôme post DUT renseigné.</p>
<?php } ?>
	</section>
	<section id="entreprises"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuEntreprises"';?>>
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#entreprises" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Entreprises</h2>
		<ul>
<?php
	if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($entreprises as $entreprise) {
?>
			<li>
				<span class="date">de <?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL || $entreprise->getDateEmbaucheFin() == 0000-00-00) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></span>
				<h3 class="entreprise"><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></h3>
				<dl>
					<dt class="poste">Poste</dt>
					<dd><?php echo $entreprise->getPoste()->getLibelle();?></dd>
				</dl>
			</li>
<?php	}
	} if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) { ?>
			<li>
				<a class="add" href="entreprise-selectionner/<?php echo $ancien->getId(); ?>">Ajouter une nouvelle entreprise</a>
			</li>
		<?php }?>
		</ul>
<?php
	if($entreprises == NULL) { ?>
		<p class="sad">Aucune entreprise.</p>
<?php }
?>
	</section>
	<section id="specialisations">
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#specialisations" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Spécialisations</h2>
		<ul>
<?php
	if($spes != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($spes as $spe) {
?>
			<li>
				<p><?php echo $spe->getSpecialisation()->getLibelle(); echo ' ('.$spe->getSpecialisation()->getTypeSpecialisation()->getLibelle().')'; ?></p>
			</li>
<?php	}
	} if ($_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getId() == $ancien->getId()) { ?>
			<li>
				<a class="add" href="specialisation-selectionner/<?php echo $ancien->getId(); ?>">Ajouter une nouvelle spécialisation</a>
			</li>
		<?php }?>
		</ul>
<?php
	if($spes == NULL) { ?>
		<p class="sad">Aucune spécialisation.</p>
<?php }
?>
	</section>
<?php
	} else {
?>
	<p class="warning">Ce profil n'existe pas</p>
<?php }?>
</div>
<script type="text/javascript">
if(document.getElementById('profilInput')) {
	new FileTransfert(document.getElementById('profilInput'), 'profil/<?=$ancien->getId() ?>', function (resp) {
		document.getElementById('profilImg').src='data:image/png;base64,'+resp.image;
	});
}
if(document.getElementById('trombiInput')) {
	new FileTransfert(document.getElementById('trombiInput'), 'trombi/<?=$ancien->getId() ?>', function (resp) {
		document.getElementById('trombiImg').src='data:image/png;base64,'+resp.image;
	});
}
</script>
