<!--meta title="Paramètres" css="style/parametres.css" js="script/passwords.transit.js"-->
<div id="content">
	<h1>Paramètres du compte</h1>
	<form method="POST">
		<fieldset>
			<legend><label for="ancienMdp" >Ancien mot de passe</label></legend>
			<input type="password" id="ancienMdp" name="ancienMdp" required autofocus />
			<?php if(isset($erreurs['ancienIncor'])){ echo '<b style="color:red;">Ancien Mot de passe incorrecte</b>'; }?>
			<?php if(isset($erreurs['ancien'])){ echo '<b style="color:red;">Ancien Mot de passe obligatoire</b>'; }?>
		</fieldset>
		<fieldset>
			<legend><label for="newMdp1" >Nouveau mot de passe</label></legend>
			<input type="password" id="newMdp1" name="newMdp1" onkeyup="check(this.value)" />
			<?php if(isset($erreurs['corresp'])){ echo '<b style="color:red;">Les 2 mots de passes ne correspondent pas</b><br />'; }?>
			<label id="forNewMdp2" for="newMdp2" >Nouveau mot de passe (confirmation)</label>
			<input type="password" id="newMdp2" name="newMdp2" />
			<?php if(isset($erreurs['mqConfirm'])){ echo '<b style="color:red;">Confirmation obligatoire</b>'; }?>
		</fieldset>
        <?php
            if($_SESSION['syntheseUser']->getTypeProfil()->getLibelle()!="Admin"){
        ?>
		<fieldset>
			<label for="newsletter">Abonnement à la newsletter</label>
			<input type="checkbox" name="newsletter" id="newsletter"<?php if($abo) echo " checked";?>>
		</fieldset>
        <?php } ?>
		<input type="submit" value="Enregistrer" name="mod">
    </form>
</div>
<script>
var bar=new ProgressBar('bar');
bar.insertBefore(document.getElementById('forNewMdp2'));
document.getElementById('newMdp1').onkeyup = function(){checkPassword(this, bar)};
</script>
