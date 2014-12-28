<!--meta title="Recherche" css="style/animations.css" js="script/search.js"-->
<div id="content">
	<h1>Recherche</h1>
	<section id="criteres">
		<label for="nom" >Nom :</label>
		<input type="text" id="nom" name="nom" onkeydown="link_ajax()" /><br />

		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" onkeydown="link_ajax()" /><br />

		<label for="promotion">Promotion :</label>
		<select id="promotionInf" name="promotionInf" onchange="link_ajax()">
			<option value=""></option> <!-- Pour le choix vide -->
			<?php
			foreach($promotions as $promotion)
				echo '<option value="'.$promotion->getAnnee().'">'.$promotion->getAnnee().'</option>';
			?>
		</select>
		<select id="promotionSup" name="promotionSup" onchange="link_ajax()">
			<option value=""></option> <!-- Pour le choix vide -->
			<?php
			foreach($promotions as $promotion)
				echo '<option value="'.$promotion->getAnnee().'">'.$promotion->getAnnee().'</option>';
			?>
		</select><br />

		<label for="diplome">Diplôme DUT :</label>
		<select id="diplome" name="diplome" onchange="link_ajax()">
			<option value=""></option> <!-- Pour le choix vide -->
			<?php
			foreach($diplomes as $diplome)
				echo '<option value="'.$diplome->getId().'">'.$diplome->getLibelle().'</option>';
			?>
		</select><br />

		<label for="typeSpecialisation">Type de spécialisation :</label>
		<select id="typeSpecialisation" name="typeSpecialisation" onkeydown="link_ajax()" >
			<option value=""></option> <!-- Pour le choix vide -->
			<?php
			foreach($typesSpecialisation as $typeSpecialisation)
				echo '<option value="'.$typeSpecialisation->getId().'">'.$typeSpecialisation->getLibelle().'</option>';
			?>
		</select><br />

		<label for="specialisation">Spécialisation :</label>
		<input type="text" name="specialisation" id="specialisation" onkeydown="link_ajax()" /><br />

		<label for="diplomePostDUT">Diplôme post-DUT :</label>
		<input type="text" id="diplomePostDUT" name="diplomePostDUT" onkeydown="link_ajax()" /><br />

		<label for="etabPostDUT">Etablissement post-DUT :</label>
		<input type="text" id="etabPostDUT" name="etabPostDUT" onkeydown="link_ajax()" /><br />

		<label for="travail">Travail :</label>
		<input type="checkbox" id="travail" value="true" name="travail" onchange="link_ajax()" />
	</section>
	<section id="resultat">
	</section>
</div>
<script type="text/javascript">
link_ajax();
</script>
