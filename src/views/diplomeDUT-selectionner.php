<!--meta title="Ajout d'un Diplôme DUT" css="style/evenements.css"-->
<div id="content">
	<?php if ($_GET['id']) {?>
	<h1>Selectionner un Diplôme DUT pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
	<form action="diplomeDUT-selectionner/<?php echo $_GET['id']?>" method="post">
		<article>
			<dl>
				<dt><label for="diplome">Diplôme DUT</label></dt>
				<dd>
					<select name="diplome">
						<?php if ($diplomesDUT != NULL) {
							foreach($diplomesDUT as $diplomeDUT)
								echo '<option'.(($diplomeDUT->getId() == $diplAncien->getDiplomeDUT()->getId())?' selected':'') .' value="'.$diplomeDUT->getId().'">'.$diplomeDUT->getLibelle().'</option>';
						}?>
					</select>
					<a href="diplomesDUT" target="_blank">Accéder aux diplômes DUT</a>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
	</form>
	<?php } else {?>
		<p class="warning">Aucun id étudiant n'a été renseigné</p>
	<?php } ?>
</div>