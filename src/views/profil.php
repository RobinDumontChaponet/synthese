<!--meta title="<?php if ($ancien != NULL){echo 'Profil de '.$ancien->getNomPatronymique().$ancien->getPrenom();} else {echo 'Profil non trouvé';}?>" css="style/animations.css" css="style/profil.css"-->
<div id="content">
<?php
if ($valid) {
	if (isset($valid['lastName']) && !$valid['lastName'])
		echo '<p class="error">Le nom doit être écrit en lettres</p>';
	if  (isset($valid['city']) && !$valid['city'])
		echo '<p class="error">La ville doit être écrit en lettres</p>';
	if (isset($valid['country']) && !$valid['country'])
		echo '<p class="error">Le pays doit être écrit en lettres</p>';
	if  (isset($valid['phoneNumber']) && !$valid['phoneNumber'])
		echo '<p class="error">Mauvais format de téléphone</p>';
	if (isset($valid['mobileNumber']) && !$valid['mobileNumber'])
		echo '<p class="error">Mauvais format de mobile</p>';
	if (isset($valid['mailAddress']) && !$valid['mailAddress'])
		echo '<p class="error">Mauvais format de mail</p>';
}
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
	<h1><?php echo $ancien->getPrenom()?> <span id="nomPatronymique"><?php echo $ancien->getNomPatronymique() ?></span></h1>
	<section>
		<h2>Informations générales</h2>
		<dl>
			<dt>Nom d'usage</dt>
			<dd><?php echo $ancien->getNom();?></dd>
			<dt>Sexe</dt>
			<dd><?php echo ($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe');?></dd>
			<dt>Date de naissance</dt>
			<dd><?php echo $ancien->getDateNaissance();?></dd>
			<dt>Adresse 1</dt>
			<dd><?php echo $ancien->getAdresse1();?></dd>
			<dt>Adresse 2</dt>
			<dd><?php echo $ancien->getAdresse2();?></dd>
			<dt>Code postal</dt>
			<dd><?php echo $ancien->getCodePostal();?></dd>
			<dt>Ville</dt>
			<dd><?php echo $ancien->getVille();?></dd>
			<dt>Pays</dt>
			<dd><?php echo $ancien->getPays(); ?></dd>
			<dt>Telephone</dt>
			<dd><?php echo $ancien->getTelephone();?></dd>
			<dt>Mobile</dt>
			<dd><?php echo $ancien->getMobile();?></dd>
			<dt>Mail</dt>
			<dd><?php echo $ancien->getMail() ?></dd>
		</dl>
	</section>
	<section>
		<h2>Diplômes</h2>
		<ul>
<?php
	if ($diplomeDUT != NULL) { // Ne peut être modifié, fixe et normalement présent
?>
			<li>
				<h3><?php echo $diplomeDUT->getDiplomeDUT()->getLibelle();?></h3>
				<dl>
					<dt>Département</dt>
					<dd><?php echo $diplomeDUT->getDepartementIUT()->getNom();?></dd>
					<dt>Promotion</dt>
					<dd><?php echo $diplomeDUT->getPromotion()->getAnnee();?></dd>
				</dl>
			</li>
<?php
	}
	if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($diplomesPost as $diplomePost) {
?>
			<li>
				<h3><a href="diplome/<?php echo $diplomePost->getDiplomePostDUT()->getId();?>"><?php echo $diplomePost->getDiplomePostDUT()->getLibelle();?></a></h3>
				<dl>
					<dt>Établissement</dt>
					<dd><a href="etablissement/<?php echo $diplomePost->getEtablissement()->getId();?>"><?php echo $diplomePost->getEtablissement()->getNom();?></a></dd>
					<dt>Résultat</dt>
					<dd><?php echo $diplomePost->getResultat();?></dd>
					<dt>Période</dt>
					<dd><?php echo substr($diplomePost->getDateDebut(), 0, 4);?> - <?php echo substr($diplomePost->getDateFin(), 0, 4);?></dd>
				</dl>
			</li>
<?php
		}
	}
?>
		</ul>
	</section>
	<section>
		<h2>Entreprises</h2>
		<ul>
<?php
	if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($entreprises as $entreprise) {
?>
			<li>
				<h3><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></h3>
				<dl>
					<dt>Poste</dt>
					<dd><?php echo $entreprise->getPoste()->getLibelle();?></dd>
					<dt>Période</dt>
					<dd><?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></dd>
				</dl>
			</li>
<?php
		}
	}
?>
		</ul>
	</section>
<?php
	} else {
?>
	<p class="warning">Ce profil n'existe pas</p>
<?php }?>
</div>