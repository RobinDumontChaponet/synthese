<!--meta title="IUTbook | Profil" css="style/animations.css"-->
<section id="content">
<?php if ($ancien != NULL) {?>
	<form action="index.php?modifier" method="post">
		<fieldset>
			<legend>Images de profil</legend>
			Bla bla bla image ici
		</fieldset>
		<fieldset>
			<legend>Informations générales</legend>
			<ol>
				<?php //if nom d'usage existe se démerder mais comme j'ai rien qui marche ...?>
				<li><label for="lastName">Nom d'usage:</label><input id="lastName" type="text" placeholder="Nom marital" value="<?php echo $ancien->getNom() ?>"/><label for="lastNamePatro">Nom patronymique:</label><input id="lastNamePatro" type="text" readonly="readonly" value="<?php echo $ancien->getNomPatronymique() ?>"/><label for="firstName">Prénom :</label><input id="firstName" type="text" readonly="readonly" value="<?php echo $ancien->getPrenom()?>"/></li>
				<li><label for="birthday">Date de naissance : </label><input id="birthday" type="text" readonly="readonly" value ="<?php echo $ancien->getDateNaissance() ?>"/><label for="sex">Sexe : </label><input id="sex" type="text" value ="<?php echo $ancien->getSexe() ?>"/></li>
				<li><label for="address1">Adresse :</label><input id="address1" type="text" placeholder="Adresse" value="<?php echo $ancien->getAdresse1() ?>"/> <label for="postalCode">Code postal :</label><input id="postalCode" type="text" placeholder="Code postal" value="<?php echo $ancien->getCodePostal() ?>"/></li>
				<!--<?php //if ($adresse2)?>
					<li><label for="">Adresse 2 : </label><input type="text" value="$ancien->getAdresse2()"/></li>-->
				<li><label for="city">Ville :</label><input id="city" type="text" placeholder="Ville" value="<?php echo $ancien->getVille() ?>"/><label for="country">Pays :</label><input id="country" type="text" placeholder = "Aucun pays renseigné" value="<?php echo $ancien->getPays()?>"/></li>
				<li><label for="phoneNumber">Telephone :</label><input id="phoneNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getTelephone() ?>"/><label for="mobileNumber">Mobile :</label><input id="mobileNumber" type="text" placeholder="Pas de numéro" value="<?php echo $ancien->getMobile()?>"/></li>
			</ol>
	</fieldset>
	</form>
<?php } else { ?>
	<h1>Pas de profil</h1>
<?php }?>
</section>