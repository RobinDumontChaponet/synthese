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
				<dd><?php echo ($_SESSION['user_auth']['write'])?'<input id="inputBirthday" name="birthday" type="text" value="'.$ancien->getDateNaissance().'"/>':'<span>'.$ancien->getDateNaissance().'</span>';?></dd>
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
                            foreach($lstPays as $pays){
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
		<section id="diplomes">
			<h2>Diplômes</h2>
			<ul>
				<?php if ($_SESSION[syntheseUser]->getId() != 2) { // Autre que prof?>
				<li>
					<?php if ($_SESSION['user_auth']['write'])	//	En cas où le diplôme n'est pas le bon
						echo '<a class="edit" href="diplomeDUT-selectionner/'.$ancien->getId().'">Modifier le diplôme de l\'élève</a>'; ?>
					<h3 class="diplome"><?php if ($diplomeDUT != NULL) { echo $diplomeDUT->getDiplomeDUT()->getLibelle();} else { echo 'Non renseigné'; };?></h3>
					<dl>
						<dt class="departement">Département</dt>
						<dd><?php if ($diplomeDUT != NULL) { echo $diplomeDUT->getDepartementIUT()->getNom();} else { echo 'Non renseigné'; };?></dd>
						<dt class="promotion">Promotion</dt>
						<dd><?php if ($diplomeDUT != NULL) { echo $diplomeDUT->getPromotion()->getAnnee();} else { echo 'Non renseigné'; };?></dd>
					</dl>
				</li>
			</ul>
			<h2>Diplômes post-DUT</h2>
			<ul>
				<?php }
				if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
					foreach($diplomesPost as $diplomePost) {?>
						<li>
							<?php $dispose = DisposeDeDAO::getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), PageDAO::getByLibelle('diplome-editer'))->getDroit();
							if($dispose['write']) echo '<a class="edit" href="diplome-editer/'.$diplomePost->getDiplomePostDUT()->getId().'">Éditer</a>';
							?><a class="delete" href="diplome-supprimer">Supprimer</a>
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
							<a class="edit" href="entreprise-editer/<?php echo $entreprise->getEntreprise()->getId();?>">Éditer</a><a class="edit" href="entreprise-supprimer/<?php echo $entreprise->getEntreprise()->getId();?>">Supprimer</a>
							<h3 class="entreprise"><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></h3>
							<dl>
								<dt class="poste">Poste</dt>
								<dd><?php echo $entreprise->getPoste()->getLibelle();?></dd>
								<dt class="periode">Période</dt>
								<dd><?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></dd>
							</dl>
						</li>
					<?php }
				} ?>
				<li>
					<a class="add" href="entreprise-ajouter/<?php echo $ancien->getId();?>">Ajouter une nouvelle entreprise</a>
				</li>
			</ul>
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
</script>