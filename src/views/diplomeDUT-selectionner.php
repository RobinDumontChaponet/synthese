<!--meta title="Ajout d'un Diplôme DUT" css="style/evenements.css"-->
<div id="content">
	<h1>Selectionner un Diplôme DUT pour l'étudiant <?php echo $ancien->getPrenom()?> <?php echo $ancien->getNom()?></h1>
	<form action="diplomeDUT-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="diplome">Diplôme DUT</label></dt>
				<dd>
					<select name="diplome">
						<?php foreach($diplomesDUT as $diplomeDUT)
							echo '<option value="'.$diplomeDUT->getId().'">'.$diplomeDUT->getLibelle().'</option>';
						?>
					</select>
					<a href="diplomesDUT" target="_blank">Accéder aux diplômes DUT</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter le Diplôme DUT" />
	</form>
</div>