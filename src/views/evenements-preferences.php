<!--meta title="Préférences des évènements" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
<?php if ($_SESSION[syntheseUser]->getId() != NULL) { ?>
	<form action="evenements-preferences" method="post">
		<h1>Préférences des évènements</h1>
		<fieldset>
			<ul>
				<?php foreach($typesEvent as $typeEvent) { ?>
					<li>
						<label for="preference<?php echo $typeEvent->getId()?>"><?php echo $typeEvent->getLibelle();?></label>
						<input id="preference<?php echo $typeEvent->getId()?>" name="check[]" value="<?php echo $typeEvent->getId()?>" type="checkbox"<?php if(in_array($typeEvent->getId(), $preferencesTypesEvent)) echo " checked"; ?>>
					</li>
				<?php } ?>
			</ul>
		</fieldset>
		<input type="submit" name="submit" value="Mettre à jour ses préférences"/>
	</form>
<?php
} else {?>
		<p class="warning">Vous disposez pas de préférences d'évènements</p>
<?php }?>
</div>