<!--meta title="IUTbook | Profil" css="style/animations.css"-->
<section id="content">
	<form action="index.php?modifier" method="post">
		<fieldset>
			<legend>Images de profil</legend>
			Bla bla bla image ici
		</fieldset>
		<fieldset>
			<legend>Informations générales</legend>
			<ol>
				<?php //if nom d'usage existe se démerder mais comme j'ai rien qui marche ...?>
				<li><label for="lastNamePatro">Nom patronymique:</label><input type="text" value="$ancien->getNom()"/><label for="lastName">Nom d'usage:</label><input type="text" value="$ancien->getNom()"/><label for="firstName">Prénom :</label><input type="text" value="$ancien->getPrenom()"/></li>
				<li><label for="birthday">Date de naissance : </label><input type="text" value ="$ancien->getNaissance()"/><label for="sex">Sexe : </label><input type="text" value ="$ancien->getSexe()"/></li>
				<li><label for="adress1">Adresse :</label><input type="text" value="$ancien->getAdresse1()"/> <label for="postalCode">Code postal :</label><input type="text" value="$ancien->getCodePostal()"/></li>
				<!--<?php //if ($adresse2)?>
					<li><label for="">Adresse 2 : </label><input type="text" value="$ancien->getAdresse2()"/></li>-->
				<li><label for="city">Ville :</label><input type="text" value="$ancien->getVille()"/><label for="country">Pays :</label><input type="text" value="$ancien->getPays()"/></li>
				<li><label for="phoneNumber">Telephone :</label><input type="text" value="$ancien->getTelephone()"/><label for="mobileNumber">Mobile :</label><input type="text" value="$ancien->getMobile()"/></li>
			</ol>
	</fieldset>
	</form>
</section>