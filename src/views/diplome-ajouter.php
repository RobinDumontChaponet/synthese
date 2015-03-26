<!--meta title="Ajout d'un diplôme" css="style/evenements.css"-->
<div id="content">
	<?php if ($error) echo '<p class="error">Le libelle et le domaine doivent être renseignés</p>';?>
	<h1>Ajouter un diplôme</h1>
	<form action="diplome-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Libelle</label></dt>
				<dd class="diplome"><input id="libelle" name="libelle" type="text" placeholder="Nom du Diplôme" autofocus/></dd>
				<dt><label for="domaine">Domaine</label></dt>
				<dd class="domaine">
					<select name="domaine" id="domaine">
					<?php foreach($domaines as $domaine)
						echo '<option value="'.$domaine->getId().'">'.$domaine->getLibelle().' ('.$domaine->getDescription().')</option>';
					?>
					</select>
					<a class="domaines" href="domaines" target="_blank">Voir les domaines (nouvel onglet)</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter le diplôme" />
		<script>backButton()</script>
	</form>
</div>