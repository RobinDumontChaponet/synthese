<!--meta title="Ajout de Diplôme DUT" css="style/evenements.css"-->
<div id="content">
	<?php if (isset($_GET) && $_GET['idAncien'] != NULL && $_GET['idDiplomeDUT'] != NULL && $_GET['idDepartement'] != NULL && $_GET['idPromotion'] !=NULL) {?>
	<h1>Modification d'un Diplôme DUT pour l'étudiant <?php if($ancien != NULL) echo $ancien->getPrenom().' '.$ancien->getNomPatronymique();?></h1>
	<form action="" method="post">
		<article>
			<dl>
				<dt><label for="diplome">Diplôme DUT</label></dt>
				<dd class="diplome">
					<select name="diplome">
						<?php if ($diplomesDUT != NULL) {
							foreach($diplomesDUT as $diplomeDUT)
								echo '<option value="'.$diplomeDUT->getId().$diplomeDUT->getDepartementIUT()->getId().'">'.$diplomeDUT->getLibelle().'</option>';
						} else {
							echo '<option value="NULL">Aucun diplôme disponible pour cette personne</option>';
						}?>
					</select>
					<a class="diplomes" href="diplomesDUT" target="_blank">Accéder aux diplômes DUT (nouvel onglet)</a>
				</dd>
				<dt><label for="promotion">Promotion</label></dt>
				<dd><input id="promotion" name="promotion" value="<?php echo $promotion->getAnnee(); ?>"/></dd>
				<p>Si la promotion n'existe pas, elle sera créer</p>
			</dl>
		</article>
		<input type="submit" value="Modifier le diplôme DUT de l'étudiant" />
		<a href="profil/<?php echo $_GET['idAncien']?>">Retour étudiant</a>
	</form>
	<?php } else {?>
		<p class="warning">Aucun id étudiant n'a été renseigné</p>
	<?php } ?>
</div>