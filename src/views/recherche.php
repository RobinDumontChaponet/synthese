<!--meta title="Recherche" css="style/recherche.css" needJs="needJs" js="script/restriction_annees.js" js="script/search.js" -->

<div id="content">
	<h1>Recherche</h1>
	<section id="criteres">
		<form action="#" onsubmit="return false" name="search" method="get">
			<article>
				<fieldset>
					<div data-help="Recherchez par nom.">
						<label for="nom">Nom</label>
						<input type="text" id="nom" name="nom" />
					</div>
					<div data-help="Recherchez par prénom.">
						<label for="prenom">Prénom</label>
						<input type="text" id="prenom" name="prenom" />
					</div>
				</fieldset>
				<fieldset>
					<div data-help="Recherchez par promotion(s).">
						<label for="promotionInf">Promotion entre</label>
						<select id="promotionInf" name="promotionInf" onmouseup="selection();" onkeyup="selection();">
							<option value=""></option> <!-- Pour le choix vide -->
							<?php
							foreach($promotions as $promotion)
								echo '<option value="'.$promotion->getAnnee().'">'.$promotion->getAnnee().'</option>';
							?>
						</select>
						<label for="promotionSup">et</label>
						<select name="promotionSup" id="promotionSup">
							<option value=""></option> <!-- Pour le choix vide -->
							<?php
							foreach($promotions as $promotion)
								echo '<option value="'.$promotion->getAnnee().'">'.$promotion->getAnnee().'</option>';
							?>
						</select>
					</div>
					<div>
						<label for="diplome">Diplôme DUT</label>
						<select id="diplome" name="diplome">
							<option value=""></option> <!-- Pour le choix vide -->
							<?php
							foreach($diplomes as $diplome)
								echo '<option value="'.$diplome->getId().'">'.$diplome->getSigle().'</option>';
							?>
						</select>
					</div>
				</fieldset>
				<fieldset>
					<div>
						<label for="specialisation">Spécialisation</label>
                        <select id="specialisation" name="specialisation">
                        <option value=""></option> <!-- Pour le choix vide -->
						<?php
						foreach($spes as $spe)
								echo '<option value="'.$spe->getId().'">'.$spe->getLibelle().'</option>';
				        ?>
                        </select>
					</div>
					<div>
						<label for="typeSpecialisation">Type de spécialisation</label>
						<select id="typeSpecialisation" name="typeSpecialisation">
							<option value=""></option> <!-- Pour le choix vide -->
							<?php
							foreach($typesSpecialisation as $typeSpecialisation)
								echo '<option value="'.$typeSpecialisation->getId().'">'.$typeSpecialisation->getLibelle().'</option>';
							?>
						</select>
					</div>
				</fieldset>
				<fieldset>
					<div>
						<label for="diplomePostDUT">Diplôme post-DUT</label>
						<select id="diplomePostDut" name="diplomePostDut">
                        			<option value=""></option>
							<?php
							foreach($diplomesPostDut as $dpd)
								echo '<option value="'.$dpd->getId().'">'.$dpd->getLibelle().'</option>';
							?>
						</select>
					</div>
					<div>
						<label for="etabPostDUT">Etablissement post-DUT</label>
						<input type="text" id="etabPostDUT" name="etabPostDUT" />
					</div>
				</fieldset>
				<fieldset>
					<div>
						<label for="travail">Travail</label>
						<select id="travail" name="travail">
                            				<option value=""></option>
							<?php
							foreach($travail as $trv)
								echo '<option value="'.$trv->getId().'">'.$trv->getLibelle().'</option>';
							?>
						</select>
					</div>
					<div>
						<label for="travailActuel">Travaille</label>
						<input type="checkbox" id="travailActuel" value="true" name="travailActuel" onclick="decocherAutre(0)" />
                    	<label for="NtravailActuel">Ne travaille pas</label>
                    	<input type="checkbox" id="NtravailActuel" value="true" name="NtravailActuel" onclick="decocherAutre(1)" />
					</div>
				</fieldset>
			</article>
		</form>
	</section>
	<section id="resultat">
		<table>
			<thead>
				<tr>
					<th>Sélectionner</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Promotion</th>
					<th>Diplôme DUT</th>
					<th>Type spécialisation</th>
					<th>Spécialisation</th>
					<th>Diplômes post-DUT</th>
					<th>Etablissements</th>
					<th>Travail</th>
					<th>Profil</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
        <section><label for="selectAll">Sélectionner tout le monde</label><input type="checkbox" id="selectAll" onclick="selectAll();" /></section>
		<nav class="pagination"></nav>
	</section>
    <section id="actions">
        <form method="POST" action="message-ecrire" id="send_message">
            <input type="submit" value="Envoyer un message" />
            <input type="hidden" id="infosCheck" name="infosCheck" />
        </form>
        <?php if(isset($msgErrAdresse)){ echo $msgErrAdresse;} ?>
    </section>
</div>
<script type="text/javascript">
init_search();
</script>

