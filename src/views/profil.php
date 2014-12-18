<!--meta title="IUTbook | Profil" css="style/animations.css"-->
<section id="content">
	<fieldset>
		<legend>Images de profil</legend>
		Bla bla bla image ici
	</fieldset>
	<fieldset>
		<legend>Informations générales</legend>
		<ol>
			<form action="index.php?modifier" method="post">
				<?php //if nom d'usage existe se démerder mais comme j'ai rien qui marche ...?>
				<li><label form="lastNamePatro">Nom patronymique:</label><input type="text" value="getNom()"><label form="lastName">Nom d'usage:</label><input type="text" value="getNom()"><label form="firstName">Prénom :</label><input type="text" value="getPrenom()"></li>
				<li><label form="birthday">Date de naissance : </label><input type="text" value ="get</li>
				<li><label form="adress1">Adresse :</label><input type="text" value="getAdresse1()"> <label form="postalCode">Code postal :</label><input type="text" value="getCodePostal()"></li>
				<?php // if adress2 exist then show it, else don't ...?>
				<li><label form="city">Ville :</label><input type="text" value="getVille()"><label form="country">Pays :</label><input type="text" value="getPays()"></li>
				<li><label form="phoneNumber">Telephone :</label><input type="text" value="getTelephone()"><label form="mobileNumber">Mobile :</label><input type="text" value="getMobile()"></li>
			</form>
		</ol>
	</fieldset>
</section>