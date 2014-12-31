<!--meta title="<?php if ($ancien != NULL){echo 'Profil de '.$ancien->getNomPatronymique().$ancien->getPrenom();} else {echo 'Profil non trouvé';}?>" css="style/animations.css" css="style/profil.css"-->
<div id="content">
<?php
if (isset($ancien) && $ancien != NULL) {?>
	<figure>
		<?php if ($imageProfil != NULL)	//	Si il y a une image de profil
			echo '<img height="230px" width="200px" src="helpers/imageProfil.php?id='.$ancien->getId().'" alt="Image de profil"/>';
		else
			echo '<img src="style/images/nobody.png" alt="Pas d\'image de profil"/>';
		if ($imageTrombi != NULL)	//	Si il y a une image de trombi
			echo '<img height="230px" width="200px" src="helpers/imageTrombi.php?id='.$ancien->getId().'" alt="Image de trombinoscope"/>';
		else
			echo '<img src="style/images/nobody.png" alt="Pas d\'image de trombinoscope"/>';?>
		<!--<input type="file" name="imageProfil"/>-->
	</figure>
	<h1><?php echo $ancien->getPrenom()?> <span class="nomPatronymique"><?php echo $ancien->getNomPatronymique() ?></span>
	<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
		echo '<a class="aEdit" href="profil-editer/'.$ancien->getId().'" title="Éditer le profil...">Éditer...</a>';
	?></h1>
	<section id="info">
		<h2>Informations générales</h2>
		<dl>
			<dt id="nomUsage">Nom d'usage</dt>
			<dd><?php echo $ancien->getNom();?></dd>
			<dt id="sexe<?php echo strtoupper($ancien->getSexe());?>">Sexe</dt>
			<dd><?php echo ($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe');?></dd>
			<dt id="dateNaissance">Date de naissance</dt>
			<dd><?php echo $ancien->getDateNaissance();?></dd>
			<dt id="adresse1">Adresse 1</dt>
			<dd><?php echo $ancien->getAdresse1();?></dd>
			<dt id="adresse2">Adresse 2</dt>
			<dd><?php echo $ancien->getAdresse2();?></dd>
			<dt id="codePostal">Code postal</dt>
			<dd><?php echo $ancien->getCodePostal();?></dd>
			<dt id="ville">Ville</dt>
			<dd><?php echo $ancien->getVille();?></dd>
			<dt id="pays">Pays</dt>
			<dd><?php echo $ancien->getPays(); ?></dd>
			<dt id="telephoneFixe">Telephone</dt>
			<dd><a href="tel:<?php echo $ancien->getTelephone();?>"><?php echo $ancien->getTelephone();?></a></dd>
			<dt id="telephoneMobile">Mobile</dt>
			<dd><a href="tel:<?php echo $ancien->getMobile();?>"><?php echo $ancien->getMobile();?></a></dd>
			<dt id="mail">Mail</dt>
			<dd><a href="mailto:<?php echo $ancien->getMail();?>"><?php echo $ancien->getMail();?></a></dd>
		</dl>
	</section>
	<section id="diplomes">
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="aEdit" href="profil-editer/'.$ancien->getId().'#diplomes" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Diplômes</h2>
		<ul>
<?php
	if ($diplomeDUT != NULL) { // Ne peut être modifié, fixe et normalement présent
?>
			<li>
				<h3 class="diplome"><?php echo $diplomeDUT->getDiplomeDUT()->getLibelle();?></h3>
				<dl>
					<dt class="departement">Département</dt>
					<dd><?php echo $diplomeDUT->getDepartementIUT()->getNom();?></dd>
					<dt class="promotion">Promotion</dt>
					<dd><?php echo $diplomeDUT->getPromotion()->getAnnee();?></dd>
				</dl>
			</li>
<?php
	}
	if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($diplomesPost as $diplomePost) {
?>
			<li>
				<h3 class="diplome"><a href="diplome/<?php echo $diplomePost->getDiplomePostDUT()->getId();?>"><?php echo $diplomePost->getDiplomePostDUT()->getLibelle();?></a> (<?php echo $diplomePost->getDiplomePostDUT()->getDomaine()->getLibelle();?>)</h3>
				<dl>
					<dt class="etablissement">Établissement</dt>
					<dd><a href="etablissement/<?php echo $diplomePost->getEtablissement()->getId();?>"><?php echo $diplomePost->getEtablissement()->getNom();?></a></dd>
					<dt class="resultat">Résultat</dt>
					<dd><?php echo $diplomePost->getResultat();?></dd>
					<dt class="periode">Période</dt>
					<dd><?php echo substr($diplomePost->getDateDebut(), 0, 4);?> - <?php echo substr($diplomePost->getDateFin(), 0, 4);?></dd>
				</dl>
			</li>
<?php
		}
	}
?>
		</ul>
<?php if($diplomeDUT==null && $diplomesPost==null) { ?>
		<p class="sad">Aucun diplôme.</p>
<?php } ?>
	</section>
	<section id="entreprises">
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="aEdit" href="profil-editer/'.$ancien->getId().'#entreprises" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Entreprises</h2>
		<ul>
<?php
	if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($entreprises as $entreprise) {
?>
			<li>
				<h3 class="entreprise"><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></h3>
				<dl>
					<dt class="poste">Poste</dt>
					<dd><?php echo $entreprise->getPoste()->getLibelle();?></dd>
					<dt class="periode">Période</dt>
					<dd><?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></dd>
				</dl>
			</li>
<?php
		}
?>
		</ul>
<?php
	} else {
?>
		<p class="sad">Aucune entreprise.</p>
<?php
	}
?>
	</section>
<?php
	} else {
?>
	<p class="warning">Ce profil n'existe pas</p>
<?php }?>
</div>