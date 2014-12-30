<!--meta title="<?php if ($ancien != NULL){echo 'Modification profil de '.$ancien->getNomPatronymique().$ancien->getPrenom();} else {echo 'Profil non trouvé';}?>" css="style/animations.css" css="style/profil.css"-->
<div id="content">
<?php 
if ($valid) {
	if (isset($valid['lastName']) && !$valid['lastName'])
		echo '<p class="error">Le nom doit être écrit en lettres</p>';
	if (isset($valid['lastName']) && !$valid['lastName'])
		echo '<p class="error">Le nom patronymique doit être écrit en lettres</p>';
	if (isset($valid['firstName']) && !$valid['firstName'])
		echo '<p class="error">Le prénom doit être écrit en lettres</p>';
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
	if (isset($valid['birthday']) && !$valid['birthday'])
		echo '<p class="error">Mauvais format de date : YYYY-MM-DD</p>';
}
	
if (isset($ancien) && $ancien != NULL && ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])) {?>
	<figure>
		<?php if ($imageProfil != NULL)	//	Si il y a une image de profil
			echo '<img height="230px" width="200px" src="helpers/imageProfil.php?id='.$ancien->getId().'" alt="Image de profil"/>';
		else
			echo '<img src="style/images/nobody.png" alt="Pas d\'image de profil"/>';
		if ($imageTrombi != NULL)	//	Si il y a une image de trombi
			echo '<img height="230px" width="200px" src="helpers/imageTrombi.php?id='.$ancien->getId().'" alt="Image de trombinoscope"/>';
		else
			echo '<img src="style/images/nobody.png" alt="Pas d\'image de trombinoscope"/>';?>
		<!--<input type="file" name="imageProfil"/> Il faut faire un input sur cette page pour upload/supprimer l'image de profil vu que tu as dit que tu avais déjà des trucs tout bien fait et tout et que tu t'en occuperais alors j'ai laissé ça comme ça et j'espère que le commentaire est assez grand pour que tu le vois!-->
	</figure>
	<form action="<?php ((isset($_GET['id']))?'profil':'profil/'.$_GET['id'])?>" method="post">
		<?php if ($_SESSION['user_auth']['write'])
			echo '<h1><input type="text" placeholder="Prénom" name="firstName" value="'.$ancien->getPrenom().'"></input><input type="text" placeholder="Nom" name="name" value="'.$ancien->getNomPatronymique().'"></input></h1>';
		else
			echo '<h1>'.$ancien->getPrenom().'<span id="nomPatronymique"> '.$ancien->getNomPatronymique().'</span></h1>'; ?>
		<section>
			<h2>Informations générales</h2>
			<dl>
				<dt></label for="lastName">Nom d'usage</label></dt>
				<dd><input id="lastName" name="lastName" type="text" placeholder="Deuxième nom" value="<?php echo $ancien->getNom();?>"/></dd>
				<dt></label for="sex">Sexe</label></dt>
				<?php if ($_SESSION['user_auth']['write'])	//	L'admin a tout les droits
					echo '<dd><select id="sex" name="sex"><option'.(($ancien->getSexe() == 'm')?' selected':'').' value="m">Homme</option><option'.(($ancien->getSexe() == 'f')?' selected':'').' value="f">Femme</option></select></dd>';
				else
					echo '<dd><input id="sex" type="text" readonly="readonly" value ="'.(($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe')).'"/></dd>';?>
				<dt></label for="birthday">Date de naissance</label></dt>
				<?php if ($_SESSION['user_auth']['write'])	//	L'admin a tout les droits
					echo '<dd><input id="birthday" name="birthday" type="text" value ="'.$ancien->getDateNaissance().'"/></dd>';
				else
					echo '<dd><input id="birthday" type="text" readonly="readonly" value ="'.$ancien->getDateNaissance().'"/></dd>';?>
				<dt></label for="address1">Adresse 1</label></dt>
				<dd><input id="address1" name="address1" type="text" placeholder="Adresse" value="<?php echo $ancien->getAdresse1();?>"/></dd>
				<dt></label for="address2">Adresse 2</label></dt>
				<dd><input id="address2" name="address2" type="text" placeholder="Adresse 2" value="<?php echo $ancien->getAdresse2(); ?>"/></dd>
				<dt></label for="postalCode">Code postal</label></dt>
				<dd><input id="postalCode" name="postalCode" type="text" placeholder="Code postal" value="<?php echo $ancien->getCodePostal(); ?>"/></dd>
				<dt></label for="city">Ville :</label></dt>
				<dd><input id="city" name="city" type="text" placeholder="Aucune ville renseignée" value="<?php echo $ancien->getVille(); ?>"/></dd>
				<dt></label for="country">Pays :</label></dt>
				<dd><input id="country" name="country" type="text" placeholder = "Aucun pays renseigné" value="<?php echo $ancien->getPays(); ?>"/></li></dd>
				<dt></label for="phoneNumber">Telephone</label></dt>
				<dd><input id="phoneNumber" name="phoneNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getTelephone(); ?>"/></dd>
				<dt></label for="mobileNumber">Mobile :</label></dt>
				<dd><input id="mobileNumber" name="mobileNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getMobile(); ?>"/></dd>
				<dt></label for="mailAddress">Mail</label></dt>
				<dd><input id="mailAddress" name="mailAddress" type="text" placeholder="Aucune adresse mail" value="<?php echo $ancien->getMail() ?>"/></dd>
			</dl>
		</section>
		<section>
			<h2>Diplômes</h2>
			<ul>
				<?php if ($diplomeDUT != NULL) { // Ne peut être modifié, fixe et normalement présent?>
					<li>
						<?php if ($_SESSION['user_auth']['write'])	//	En cas où le diplôme n'est pas le bon
							echo '<a href="#">Modifier le diplôme de cet élève</a>'; ?>
						<h3><?php echo $diplomeDUT->getDiplomeDUT()->getLibelle();?></h3>
						<dl>
							<dt></label for="departement">Département</label></dt>
							<dd><?php echo $diplomeDUT->getDepartementIUT()->getNom();?></dd>
							<dt></label for="promotion">Promotion</label></dt>
							<dd><?php echo $diplomeDUT->getPromotion()->getAnnee();?></dd>
						</dl>
					</li>
				<?php }
				if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
					foreach($diplomesPost as $diplomePost) {?>
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
							<a href="modif">Modifier</a>
							<a href="diplome-supprimer">Supprimer</a>
						</li>
					<?php }
				} ?>
				<li>
					<a href="diplome-ajouter/<?php echo $ancien->getId();?>">Ajouter un nouveau diplôme</a>
				</li>
			</ul>
		</section>
		<section>
			<h2>Entreprises</h2>
			<ul>
				<?php if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
					foreach($entreprises as $entreprise) {?>
						<li>
							<h3><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></h3>
							<dl>
								<dt>Poste</dt>
								<dd><?php echo $entreprise->getPoste()->getLibelle();?></dd>
								<dt>Période</dt>
								<dd><?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></dd>
							</dl>
							<a href="modif">Modifier</a>
							<a href="entreprise-supprimer/<?php echo $entreprise->getEntreprise()->getId(); ?>">Supprimer</a>
						</li>
					<?php }
				} ?>
				<li>
					<a href="entreprise-ajouter/<?php echo $ancien->getId();?>">Ajouter une nouvelle entreprise</a>
				</li>
			</ul>
		</section>
		<input type="submit" value="Enregistrer les modifications" />
	</form>
	<?php } else {?>
		<p class="warning">Vous ne pouvez pas modifier ce profil</p>
	<?php }?>
</div>