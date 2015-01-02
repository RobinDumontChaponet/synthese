<!--meta title="Créer un groupe" -->
<div id="content">
    <?php if(!isset($id)){  // si aucun id, le groupe n'est pas crée?>
        <h1>Créer un groupe</h1><br>

        <form  method="POST">
            <label for="nom" >Nom du nouveau groupe :</label>
            <input type="text" id="nom" name="nom" required autofocus/>
            <br>
            <input type="submit" name="addGroupe" value="Ajouter">
        </form>
    
    <?php }else{ // si le groupe est crée?>
        <h1>Inviter un ami</h1>
    <?php } ?>
</div>