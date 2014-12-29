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
<?php if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) { /* Si l'utilisateur est celui loggué, modif possible */ ?>
		<ol>
			<li><label for="lastName">Nom d'usage :</label><input id="lastName" name="lastName" type="text" placeholder="Deuxième nom" value="<?php echo $ancien->getNom(); ?>"/></li>
			<li><label for="sex">Sexe :</label>
				<input id="sex" type="text" readonly="readonly" value ="<?php echo ($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe'); ?>"/></li>

			<li><label for="birthday">Date de naissance :</label><input id="birthday" type="text" readonly="readonly" value ="<?php echo $ancien->getDateNaissance(); ?>"/></li>
			<li><label for="address1">Adresse 1 :</label><input id="address1" name="address1" type="text" placeholder="Adresse" value="<?php echo $ancien->getAdresse1(); ?>"/>
			<br /><label for="address2">Adresse 2 :</label><input id="address2" name="address2" type="text" placeholder="Adresse 2" value="<?php echo $ancien->getAdresse2(); ?>"/></li>
			<li><label for="postalCode">Code postal :</label><input id="postalCode" name="postalCode" type="text" placeholder="Code postal" value="<?php echo $ancien->getCodePostal(); ?>"/><label for="city">Ville :</label><input id="city" name="city" type="text" placeholder="Aucune ville renseignée" value="<?php echo $ancien->getVille(); ?>"/><label for="country">Pays :</label><input id="country" name="country" type="text" placeholder = "Aucun pays renseigné" value="<?php echo $ancien->getPays(); ?>"/></li>
			<li><label for="phoneNumber">Telephone :</label><input id="phoneNumber" name="phoneNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getTelephone(); ?>"/><label for="mobileNumber">Mobile :</label><input id="mobileNumber" name="mobileNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getMobile(); ?>"/></li>
			<li><label for="mailAddress">Mail :</label><input id="mailAddress" name="mailAddress" type="text" placeholder="Pas d'adresse mail" value="<?php echo $ancien->getMail() ?>"/></li>
		</ol>
<?php } else { /*Si c'est un autre profil que celui de l'utilisateur log ou admin, readonly partout*/ ?>
		<ol>
			<li><label for="lastName">Nom d'usage :</label><input id="lastName" type="text" placeholder="Deuxième nom" readonly="readonly" value="<?php echo $ancien->getNom(); ?>"/></li>
			<li><label for="sex">Sexe : </label><input id="sex" type="text" readonly="readonly" value ="<?php if ($ancien->getSexe() == "m") echo "Homme"; else if ($ancien->getSexe() == "f") echo "Femme";?>"/></li>
			<li><label for="birthday">Date de naissance : </label><input id="birthday" type="text" readonly="readonly" value ="<?php echo $ancien->getDateNaissance(); ?>"/></li>
			<li><label for="address1">Adresse 1 :</label><input id="address1" type="text" placeholder="Adresse" readonly="readonly" value="<?php echo $ancien->getAdresse1(); ?>"/>
			<br /><label for="address2">Adresse 2 :</label><input id="address2" type="text" placeholder="Adresse 2" readonly="readonly" value="<?php echo $ancien->getAdresse2(); ?>"/></li>
			<li><label for="postalCode">Code postal :</label><input id="postalCode" type="text" placeholder="Code postal" readonly="readonly" value="<?php echo $ancien->getCodePostal(); ?>"/><label for="city">Ville :</label><input id="city" type="text" placeholder="Aucune ville renseignée" readonly="readonly" value="<?php echo $ancien->getVille(); ?>"/><label for="country">Pays :</label><input id="country" type="text" placeholder = "Aucun pays renseigné" readonly="readonly" value="<?php echo $ancien->getPays(); ?>"/></li>
			<li><label for="phoneNumber">Telephone :</label><input id="phoneNumber" type="text" placeholder="Pas de numéro" readonly="readonly" value="<?php echo $ancien->getTelephone(); ?>"/><label for="mobileNumber">Mobile :</label><input id="mobileNumber" type="text" placeholder="Pas de numéro" readonly="readonly" value="<?php echo $ancien->getMobile(); ?>"/></li>
			<li><label for="mailAddress">Mail :</label><input id="mailAddress" type="text" placeholder="Pas d'adresse mail" readonly="readonly" value=""/></li>
		</ol>
<?php }?>
	</section>
	<section>
		<h2>Diplômes</h2>
		<ol>
<?php if ($diplomeDUT != NULL) { // Ne peut être modifié, fixe et normalement présent?>
			<li>
				<label for="diplomeDUT">Diplôme :</label>
				<input id="diplomeDUT" type="text" placeholder="Diplome" readonly="readonly" value="<?php echo $diplomeDUT->getDiplomeDUT()->getLibelle();?>"/>
				<label for="departement">Département :</label>
				<input id="departement" type="text" placeholder="Département" readonly="readonly" value="<?php echo $diplomeDUT->getDepartementIUT()->getNom();?>"/>
				<label for="promotion">Promotion :</label>
				<input id="promotion" type="text" placeholder="Promotion" readonly="readonly" value="<?php echo $diplomeDUT->getPromotion()->getAnnee();?>"/>
			</li>
<?php }
if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
	foreach($diplomesPost as $diplomePost) {?>
			<li>
				<a href="diplome/<?php echo $diplomePost->getDiplomePostDUT()->getId();?>"><label for="diplomePost<?php echo $diplomePost->getDiplomePostDUT()->getId();?>">Diplôme :</label>
					<input id="diplomePost<?php echo $diplomePost->getDiplomePostDUT()->getId();?>" type="text" placeholder="Diplome" readonly="readonly" value="<?php echo $diplomePost->getDiplomePostDUT()->getLibelle();?>"/></a>
					<a href="etablissement/<?php echo $diplomePost->getEtablissement()->getId();?>"><label for="etablissement<?php echo $diplomePost->getDiplomePostDUT()->getId();?>">Établissement :</label>
					<input id="etablissement<?php echo $diplomePost->getDiplomePostDUT()->getId();?>" type="text" placeholder="Établissement" readonly="readonly" value="<?php echo $diplomePost->getEtablissement()->getNom();?>"/></a>
					<label for="resultat<?php echo $diplomePost->getDiplomePostDUT()->getId();?>">Résultat :</label>
					<input id="resultat<?php echo $diplomePost->getDiplomePostDUT()->getId();?>" type="text" placeholder="Résultat" readonly="readonly" value="<?php echo $diplomePost->getResultat();?>"/>
					<label for="periode<?php echo $diplomePost->getDiplomePostDUT()->getId();?>">Période :</label>
					<input id="periode<?php echo $diplomePost->getDiplomePostDUT()->getId();?>" type="text" placeholder="Résultat" readonly="readonly" value="<?php echo substr($diplomePost->getDateDebut(), 0, 4);?> - <?php echo substr($diplomePost->getDateFin(), 0, 4);?>"/>
					<?php if ($_SESSION[syntheseUser]->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) {?><aside><a href="modif">Modifier (ou faire un lien sur la ligne d'info)</a><a href="suppr">Supprimer</a></aside><?php }?>
			</li>
	<?php }
}
if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) {?>
			<li><aside><a href="#">Ajouter +</a></aside></li>
<?php }?>
		</ol>
	</section>
	<section>
		<h2>Entreprises</h2>
		<ol>
<?php if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
	foreach($entreprises as $entreprise) {?>
			<li>
				<a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><label for="entreprise<?php echo $entreprise->getEntreprise()->getId()?>">Entreprise :</label>
					<input id="entreprise<?php echo $entreprise->getEntreprise()->getId()?>" type="text" placeholder="Entreprise" readonly="readonly" value="<?php echo $entreprise->getEntreprise()->getNom();?>"/></a>
					<label for="poste<?php echo $entreprise->getEntreprise()->getId()?>">Poste :</label>
					<input id="poste<?php echo $entreprise->getEntreprise()->getId()?>" type="text" placeholder="Poste" readonly="readonly" value="<?php echo $entreprise->getPoste()->getLibelle();?>"/>
					<label for="periode<?php echo $entreprise->getEntreprise()->getId()?>">Période :</label>
					<input id="periode<?php echo $entreprise->getEntreprise()->getId()?>" type="text" placeholder="Période" readonly="readonly" value="<?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?>"/>
			</li>
	<?php }
}
if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) {?>
			<li><aside><a href="#">Ajouter +</a></aside></li>
<?php }?>
		</ol>
		</section>
			<?php if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
				echo '<input type="submit" value="Enregistrer les modifications" />';
	} else { ?>
		<p class="warning">Ce profil n'existe pas</p>
<?php }?>
</section>