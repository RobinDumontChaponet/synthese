<!--meta title="Modifier <?php echo ($entreprise != NULL)?$entreprise->getNom():'Entreprise non trouvée'; ?>" css="style/evenements.css"-->
<div id="content">
	<?php
	if(isset($error)){
		?>
		<p class="error"><?= $error; ?></p>
		<?php
	}
	?>
	<h1>Modification de l'entreprise</h1>
	<?php if ($entreprise != NULL) { ?>
	<form method="post">
		<article>
			<h3 class="entreprise"><input id="entrepriseNom" name="entrepriseNom" type="text" placeholder="Pas de libelle..." value="<?php echo $entreprise->getNom(); ?>" autofocus/></h3>
			<dl>
				<dt>Adresse 1</dt>
				<dd id="adresse1"><input id="entrepriseAd1" name="entrepriseAd1" type="text" placeholder="Pas d'adresse..." value="<?php echo $entreprise->getAdresse1(); ?>" /></dd>
				<dt>Adresse 2</dt>
				<dd id="adresse2"><input id="entrepriseAd2" name="entrepriseAd2" type="text" placeholder="Pas d'adresse..." value="<?php echo $entreprise->getAdresse2(); ?>"/></dd>
				<dt>Code postal</dt>
				<dd id="codePostal"><input id="entrepriseCp" name="entrepriseCp" type="text" placeholder="Pas de code postal..." value="<?php echo $entreprise->getCodePostal(); ?>" /></dd>
				<dt>Ville</dt>
				<dd id="ville"><input id="entrepriseVille" name="entrepriseVille" type="text" placeholder="Pas de ville..." value="<?php if(!empty($_POST)) { echo $_POST['cedex'];} else { echo $entreprise->getVille();} ?>" /></dd>
				<dt><label for="cedex">Cedex</label></dt>
				<dd class="cedex"><input id="cedex" name="cedex" type="text" placeholder="Pas de cedex..." value="<?php if(!empty($_POST)) { echo $_POST['cedex'];} else { echo $entreprise->getCedex();} ?>"/></dd>
				<dt>Pays</dt>
				<dd id="pays">
					<select name="entreprisePays" id="entreprisePays">
						<option value="<?php echo $entreprise->getPays(); ?>" selected><?php echo $entreprise->getPays(); ?></option>
						<?php
						foreach($lstPays as $pays){
							?>
							<option value="<?= $pays; ?>"><?= $pays; ?></option>
							<?php
						}
						?>
					</select>
				</dd>
				<dt>Code APE</dt>
				<dd class="codeAPE">
					<select name="entrepriseCodeApe" id="entrepriseCodeApe">
						<option></option>
						<?php
						foreach($lstCodeApe as $code){
							if ($entreprise->getCodeAPE() != NULL) {?>
								<option value="<?= $code->getCode(); ?>" <?php if($code->getCode() == $entreprise->getCodeAPE()->getCode()) {echo 'selected';} ?>><?= $code->getCode().' : '.$code->getLibelle(); ?></option>
							<?php } else { ?>
								<option value="<?= $code->getCode();?>"><?= $code->getCode().' : '.$code->getLibelle(); ?></option>
							<?php }
						} ?>
					</select>
					<a href="codesAPE" class="codesAPE" target="_blank">Accéder aux codes APE</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
		<script>backButton()</script>
	</form>
	<?php } else { ?>
	<p class="warning">Cette entreprise n'existe pas</p>
	<script>backButton()</script>
	<?php } ?>
</div>
