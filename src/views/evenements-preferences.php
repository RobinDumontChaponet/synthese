<!--meta title="Événement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
<?php if ($_SESSION[syntheseUser]->getId() != NULL) { ?>
		<h1>Préférences des évènements</h1>
		<fieldset>
			<ul>
				<?php foreach() {?>
					<li>
						<label for="newsletter">Abonnement à la newsletter</label>
						<input id="newsletter" name="newsletter" type="checkbox" <?php if($abo) echo " checked";?>>
					</li>
				<?php }?>
			</ul>
		</fieldset>
<?php
} else {?>
		<p class="warning">Vous disposez pas de préférences d'évènements</p>
<?php }?>
</div>