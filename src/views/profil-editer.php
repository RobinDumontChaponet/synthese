<!--meta title="<?php if ($ancien != NULL){echo 'Modification profil de '.$ancien->getNomPatronymique().$ancien->getPrenom();} else {echo 'Profil non trouvé';}?>" css="style/profil.css"-->
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
		<?php
		if ($imageTrombi != NULL)	//	Si il y a une image de trombi
			echo '<img id="trombiImg" height="230px" width="200px" src="helpers/imageTrombi.php?id='.$ancien->getId().'" alt="Image de trombinoscope" />';
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
		<?php if ($imageProfil != NULL)	//	Si il y a une image de profil
			echo '<img id="profilImg" height="230px" width="200px" src="helpers/imageProfil.php?id='.$ancien->getId().'" alt="Image de profil" />';
		else
			echo '<img id="profilImg" src="style/images/nobody.png" alt="Pas d\'image de profil" />';
		?>
		<?php if(isset($ancien) && $ancien != NULL && ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])) { ?>
		<p class="button">
			<label>Importer une image...</label> <input type="file" id="profilInput" name="file" accept="image/*"> <img src="style/images/loader.gif" alt="chargement..." />
		</p>
		<?php } ?>
	</figure>
	<form action="<?php ((isset($_GET['id']))?'profil':'profil/'.$_GET['id'])?>" method="post" name="profil">
		<h1><?php if ($_SESSION['user_auth']['write'])
		echo '<input type="text" placeholder="Prénom" name="firstName" value="'.$ancien->getPrenom().'" /><input type="text" placeholder="Nom" name="name" value="'.$ancien->getNomPatronymique().'" />';
		else
			echo $ancien->getPrenom().' <span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span>'; ?>
	</h1>
	<section id="info">
		<h2>Informations générales</h2>
		<dl>
			<dt id="nomUsage"><label for="inputLastName">Nom d'usage</label></dt>
			<dd><input id="inputLastName" name="lastName" type="text" placeholder="Deuxième nom" value="<?php echo $ancien->getNom();?>"/></dd>
			<dt id="sexe<?php echo strtoupper($ancien->getSexe());?>"><label for="inputSex">Sexe</label></dt>
				<dd><?php if ($_SESSION['user_auth']['write'])	//	L'admin a tout les droits
				echo '<select id="inputSex" name="sex"><option'.(($ancien->getSexe() == 'm')?' selected':'').' value="m">Homme</option><option'.(($ancien->getSexe() == 'f')?' selected':'').' value="f">Femme</option></select>';
				else
					echo '<span>'.(($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe')).'</span>';
				?></dd>
				<dt id="dateNaissance"><label for="inputBirthday">Date de naissance</label></dt>
				<dd><?php echo ($_SESSION['user_auth']['write'])?'<input id="inputBirthday" name="birthday" type="date" maxlength="10" value="'.$ancien->getDateNaissance().'"/>':'<span>'.$ancien->getDateNaissance().'</span>';?></dd>
				<dt id="adresse1"><label for="inputAddress1">Adresse 1</label></dt>
				<dd><input id="inputAddress1" name="address1" type="text" placeholder="Pas d'adresse" value="<?php echo $ancien->getAdresse1();?>"/></dd>
				<dt id="adresse2"><label for="inputAddress2">Adresse 2</label></dt>
				<dd><input id="inputAddress2" name="address2" type="text" placeholder="Pas d'adresse" value="<?php echo $ancien->getAdresse2(); ?>"/></dd>
				<dt id="codePostal"><label for="inputPostalCode">Code postal</label></dt>
				<dd><input id="inputPostalCode" name="postalCode" type="text" placeholder="Code postal" value="<?php echo $ancien->getCodePostal(); ?>"/></dd>
				<dt id="ville"><label for="inputCity">Ville</label></dt>
				<dd><input id="inputCity" name="city" type="text" placeholder="Aucune ville renseignée" value="<?php echo $ancien->getVille(); ?>"/></dd>
				<dt id="pays"><label for="inputCountry">Pays</label></dt>
				<dd>
					<select name="country" id="inputCountry">
						<option value="<?php echo $ancien->getPays(); ?>" selected><?php echo $ancien->getPays(); ?></option>
						<?php
						foreach($listPays as $pays){
							?>
							<option value="<?= $pays; ?>" ><?= $pays; ?></option>
							<?php
						}
						?>
					</select>
				</dd>
				<dt id="telephoneFixe"><label for="inputPhoneNumber">Telephone</label></dt>
				<dd><input id="inputPhoneNumber" name="phoneNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getTelephone(); ?>"/></dd>
				<dt id="telephoneMobile"><label for="inputMobileNumber">Mobile</label></dt>
				<dd><input id="inputMobileNumber" name="mobileNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getMobile(); ?>"/></dd>
				<dt id="mail"><label for="inputMailAddress">Mail</label></dt>
				<dd><input id="inputMailAddress" name="mailAddress" type="text" placeholder="Aucune adresse mail" value="<?php echo $ancien->getMail() ?>"/></dd>
			</dl>
		</section>

		<?php if($ancien->getParents()!=NULL && ($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getTypeProfil()->getId()==2)){
		?>
		<section id="info">
			<h2>Parents</h2>
			<ul>
				<li>
					<dl>
						<dt id="adresse1"><label for="inputAddress1Parent">Adresse 1</label></dt>
						<dd><input id="inputAddress1Parent" name="address1Parent" type="text" placeholder="Pas d'adresse" value="<?php echo $ancien->getParents()->getAdresse1();?>" /></dd>
						<dt id="adresse2"><label for="inputAddress2Parent">Adresse 2</label></dt>
						<dd><input id="inputAddress2Parent" name="address2Parent" type="text" placeholder="Pas d'adresse" value="<?php echo $ancien->getParents()->getAdresse2();?>" /></dd>
						<dt id="codePostal"><label for="inputPostalCodeParent">Code postal</label></dt>
						<dd><input id="inputPostalCodeParent" name="postalCodeParent" type="text" placeholder="Pas d'adresse" value="<?php echo $ancien->getParents()->getCodePostal();?> "/></dd>
						<dt id="ville"><label for="inputCityParent">Ville</label></dt>
						<dd><input id="inputCityParent" name="cityParent" type="text" placeholder="Pas d'adresse" value="<?php echo $ancien->getParents()->getVille();?>" /></dd>
						<dt id="pays"><label for="inputCountryParent">Pays</label></dt>
						<dd>
							<select name="countryParent" id="inputCountryParent">
								<option value="<?php echo $ancien->getParents()->getPays(); ?>" selected><?php echo $ancien->getParents()->getPays(); ?></option>
							<?php
							foreach($listPays as $pays){
							?>
								<option value="<?= $pays; ?>" ><?= $pays; ?></option>
							<?php
							}
							?>
							</select>
						</dd>
						<dt id="telephoneFixe"><label for="inputPhoneNumberParent">Telephone</label></dt>
						<dd><input id="inputPhoneNumberParent" name="phoneNumberParent" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getParents()->getTelephone();?>" /></dd>
						<dt id="telephoneMobile"><label for="inputMobileNumberParent">Mobile</label></dt>
						<dd><input id="inputMobileNumberParent" name="mobileNumberParent" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getParents()->getMobile();?>" /></dd>
					</dl>
				</li>
			</ul>
		</section>
			<?php
		}
		?>
		<section id="diplomes">
			<h2>Diplômes</h2>
			<ul>
				<?php if ($_SESSION['syntheseUser']->getId() != 2 || $diplomesDUT != NULL) { // Autre que prof
					foreach ($diplomesDUT as $diplomeDUT) { ?>
					<li>
							<?php if ($_SESSION['user_auth']['write'])	//	En cas où le diplôme n'est pas le bon
							echo '<a class="edit" href="diplomeDUT-modifier/'.$ancien->getId().'&'.$diplomeDUT->getDiplomeDUT()->getId().'&'.$diplomeDUT->getDepartementIUT()->getId().'&'.$diplomeDUT->getPromotion()->getId().'">Éditer</a><a class="delete" href="index.php?requ=diplomeDUT-selectionner-supprimer&idDiplomeDUT='.$diplomeDUT->getDiplomeDUT()->getId().'&idAncien='.$ancien->getId().'&idDepartement='.$diplomeDUT->getDepartementIUT()->getId().'&idPromotion='.$diplomeDUT->getPromotion()->getId().'">Supprimer</a>'; ?>
							<h3 class="diplome"><?php if ($diplomeDUT != NULL) { echo $diplomeDUT->getDiplomeDUT()->getLibelle();} else { echo 'Non renseigné'; };?></h3>
							<dl>
								<dt class="departement">Département</dt>
								<dd><?php if ($diplomeDUT != NULL) { echo $diplomeDUT->getDepartementIUT()->getNom();} else { echo 'Non renseigné'; };?></dd>
								<dt class="promotion">Promotion</dt>
								<dd><?php if ($diplomeDUT != NULL) { echo $diplomeDUT->getPromotion()->getAnnee();} else { echo 'Non renseigné'; };?></dd>
							</dl>
						</li>
						<?php 	}
					} else
						echo '<p class="sad">Pas de diplôme(s) DUT renseigné(s)</p>';
					if($_SESSION['user_auth']['write']) { ?>
					<li>
						<a class="add" href="diplomeDUT-selectionner/<?php echo $ancien->getId();?>">Ajouter un nouveau diplôme DUT</a>
					</li>
					<?php } ?>
				</ul>
		</section>
		<section id="diplomesPostDUT">
				<h2>Diplômes post-DUT</h2>
				<ul>
					<?php
				if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
					foreach($diplomesPost as $diplomePost) {?>
					<li>
						<a class="edit" href="diplome-modifier/<?php echo $ancien->getId();?>&<?php echo $diplomePost->getDiplomePostDUT()->getId();?>&<?php echo $diplomePost->getEtablissement()->getId();?>">Éditer</a>
						<a class="delete" href="index.php?requ=diplome-selectionner-supprimer&idDiplomePost=<?php echo $diplomePost->getDiplomePostDUT()->getId();?>&idAncien=<?php echo $ancien->getId();?>&idEtablissement=<?php echo $diplomePost->getEtablissement()->getId();?>">Supprimer</a>
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
					<?php }
				} ?>
				<li>
					<a class="add" href="diplome-selectionner/<?php echo $ancien->getId();?>">Ajouter un nouveau diplôme post-DUT</a>
				</li>
			</ul>
		</section>
		<section id="entreprises">
			<h2>Entreprises</h2>
			<ul>
				<?php if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
					foreach($entreprises as $entreprise) {?>
					<li>
						<a class="edit" href="entreprise-modifier/<?php echo $entreprise->getEntreprise()->getId();?>">Éditer</a><a class="edit" href="index.php?requ=entreprise-selectionner-supprimer&idEntreprise=<?php echo $entreprise->getEntreprise()->getId();?>&idAncien=<?php echo $ancien->getId(); ?>&idPoste=<?php echo $entreprise->getPoste()->getId(); ?>&dateDebut=<?php echo $entreprise->getDateEmbaucheDeb(); ?>">Supprimer</a>
						<h3 class="entreprise"><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></h3>
						<dl>
							<dt class="poste">Poste</dt>
							<dd><?php echo $entreprise->getPoste()->getLibelle();?></dd>
							<dt class="periode">Période</dt>
							<dd><?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL || $entreprise->getDateEmbaucheFin() == 0000-00-00) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></dd>
						</dl>
					</li>
					<?php }
				} ?>
				<li>
					<a class="add" href="entreprise-selectionner/<?php echo $ancien->getId(); ?>" target="_blank">Ajouter une nouvelle entreprise</a>
				</li>
			</ul>
		</section>
		<section id="spetialisation">
			<h2>Spécialisations</h2>
			<ul>
				<?php
	if($spes != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($spes as $spe) {
			?>
			<li>
				<p><?php echo $spe->getSpecialisation()->getLibelle(); ?></p>
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
	<input type="submit" value="Enregistrer les modifications" />
</form>
<?php } else {?>
<p class="warning">Vous ne pouvez pas modifier ce profil</p>
<?php }?>
</div>
<script>
var form = document.forms['profil'],
elements   = form.elements,
wrapper  = document.getElementById('wrapper');
for(var i=0, l=elements.length; i<l; i++) {
	var el=elements[i];
	if(el.type=='text' && !el.readOnly) {
		el.onfocus = function(){wrapper.classList.add('overlay')};
		el.onblur = function(){wrapper.classList.remove('overlay')};
	}
}

new FileTransfert(document.getElementById('profilInput'), 'profil', function (resp) {
	document.getElementById('profilImg').src=resp.image;
});
new FileTransfert(document.getElementById('trombiInput'), 'trombi', function (resp) {
	document.getElementById('profilImg').src=resp.image;
});
</script>
