<!--meta title="Ajout d'un Diplôme DUT" css="style/evenements.css"-->
<div id="content">
	<?php if ($error) echo 'Vous devez renseigner le libelle';?>
	<h1>Ajouter un Diplôme DUT</h1>
	<form action="diplomeDUT-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Libelle</label></dt>
				<dd><input id="libelle" name="libelle" type="text" placeholder="Nom du Diplôme DUT" autofocus/></dd>
				<dt><label for="departementIUT">Département IUT</label></dt>
				<dd>
					<select name="departementIUT">
					<?php foreach($departementsIUT as $departementIUT)
						echo '<option value="'.$departementIUT->getId().'">'.$departementIUT->getNom().'</option>';
					?>
					</select>
					<a href="departementsIUT" target="_blank">Accéder aux départements IUT</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter le Diplôme DUT" />
	</form>
</div>
