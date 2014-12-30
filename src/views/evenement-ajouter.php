<!--meta title="Ajouter un évènement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) { ?>
		<form action="evenement-ajouter" method="post">
		<h1>Ajouter un évènement</h1>
		<ul>
			<li>
				<label for="date">Date</label>
				<input id="date" name="date" type="date"/>
			</li>
			<li>
				<label for="typEvent">Type d'évènement</label>
				<select>
					<?php echo 
					foreach($typesEvent as $typeEvent) {.'
							<option>
								
							</option>
						'.}?>
				</select>
			</li>
			<li>
				<label for="commentaire">Commentaire</label>
				<textarea id="commentaire" name="commentaire" rows="2" cols="80" placeholder="(peut être vide)" /></textarea>
			</li>
		</ul>
		<input type="submit" value="Ajouter l'évènement" />
		</form>
	<?php } ?>
</div>