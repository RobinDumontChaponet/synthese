<!--meta title="Paramètres" css="style/animations.css"-->
<div id="content">
	<h1>Paramètres du compte</h1>
    <br>
    <form method="POST">
        <label for="ancienMdp" >Ancien mot de passe :</label>
        <input type="password" id="ancienMdp" name="ancienMdp" />
        <?php if(isset($erreurs['ancienIncor'])){ echo '<b style="color:red;">Ancien Mot de passe incorrecte</b>'; }?>
        <?php if(isset($erreurs['ancien'])){ echo '<b style="color:red;">Ancien Mot de passe obligatoire</b>'; }?><br />

        <label for="newMdp1" >Nouveau mot de passe :</label>
        <input type="password" id="newMdp1" name="newMdp1" /><br />
        <?php if(isset($erreurs['corresp'])){ echo '<b style="color:red;">Les 2 mots de passes ne correspondent pas</b><br />'; }?>
        <label for="newMdp2" >Nouveau mot de passe (confirmation) :</label>
        <input type="password" id="newMdp2" name="newMdp2" />
        <?php if(isset($erreurs['mqConfirm'])){ echo '<b style="color:red;">Confirmation obligatoire</b>'; }?><br />

        <label for="newsletter" >Abonné à la newsletter :</label>
        <input type="checkbox" name="newsletter" id="newsletter" <?php if($abo){ echo "checked"; } ?>><br />

        <input type="submit" value="Modifier mon compte" name="mod">
    </form>
</div>
