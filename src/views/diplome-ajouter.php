<!--meta title="Ajout d'un diplôme" css="style/evenements.css"-->
<div id="content">
	<?php if ($error) echo '<p class="error">Vous devez renseigner le libelle et le domaine</p>';?>
	<h1>Ajouter un diplôme</h1>
	<form action="diplome-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Libelle</label></dt>
				<dd><input id="libelle" name="libelle" type="text" placeholder="Nom du Diplôme" autofocus/></dd>
				<dt><label for="domaine">Domaine</label></dt>
				<dd>
					<select name="domaine">
					<?php foreach($domaines as $domaine)
						echo '<option value="'.$domaine->getId().'">'.$domaine->getLibelle().' ('.$domaine->getDescription().')</option>';
					?>
					</select>
					<a href="domaines" target="_blank">Accéder aux domaines (nouvel onglet)</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter le diplôme" />
	</form>
</div>