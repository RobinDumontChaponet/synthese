<!--meta title="IUTbook | Profil" css="style/animations.css"-->

<section id="content">
<?php if ($ancien != NULL) {?>
	<p style="font-size:23px"><?php echo $ancien->getNomPatronymique() ?> <?php echo $ancien->getPrenom()?></p>
	<form action="index.php?modifier" method="post">
		<fieldset>
			<?php if ($noImageProfil != 1)	//	Si il n'y a pas d'image de profil
				echo '<img height="230px" width="200px" src="data:image/jpg;base64,'.base64_encode($imageTrombi).'" alt="Image de profil"/>';
			else
				echo '<img src="style/images/nobody.png" alt="Pas d\'image de profil"/>';
			if ($noImageTrombi != 1)	//	Si il n'y a pas d'image de trombi
				echo '<img height="230px" width="200px" src="data:image/jpg;base64,'.base64_encode($imageProfil).'" alt="Image de trombinoscope"/>'; 
			else
				echo '<img src="style/images/nobody.png" alt="Pas d\'image de trombi"/>';?>
			<!--<img src="helpers/viewImage.php?id=<?php echo $ancien->getId()?>" alt="test"/>-->
			<!--<input type="file" name="imageProfil"/>-->
		</fieldset>
		<fieldset>
			<legend>Informations générales</legend>
			<ol>
				<li><label for="lastName">Nom d'usage:</label><input id="lastName" type="text" placeholder="Deuxième nom" value="<?php echo $ancien->getNom() ?>"/></li>
				<li><label for="sex">Sexe : </label><input id="sex" type="text" value ="<?php echo $ancien->getSexe() ?>"/></li>
				<li><label for="birthday">Date de naissance : </label><input id="birthday" type="text" readonly="readonly" value ="<?php echo $ancien->getDateNaissance() ?>"/></li>
				<li><label for="address1">Adresse :</label><input id="address1" type="text" placeholder="Adresse" value="<?php echo $ancien->getAdresse1() ?>"/><label for="address2">Adresse 2 :</label><input id="address2" type="text" placeholder="Adresse 2" value="<?php echo $ancien->getAdresse2() ?>"/></li>
				<li><label for="postalCode">Code postal :</label><input id="postalCode" type="text" placeholder="Code postal" value="<?php echo $ancien->getCodePostal() ?>"/><label for="city">Ville :</label><input id="city" type="text" placeholder="Ville" value="<?php echo $ancien->getVille() ?>"/><label for="country">Pays :</label><input id="country" type="text" placeholder = "Aucun pays renseigné" value="<?php echo $ancien->getPays()?>"/></li>
				<li><label for="phoneNumber">Telephone :</label><input id="phoneNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getTelephone() ?>"/><label for="mobileNumber">Mobile :</label><input id="mobileNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getMobile()?>"/></li>
			</ol>
	</fieldset>
	</form>
<?php } else { ?>
	<p class="warning">Le profil n'existe pas</p>
<?php }?>
</section>