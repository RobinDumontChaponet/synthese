<!--meta title="<?php echo ($entreprise != NULL)?$entreprise->getNom():'Entreprise non trouvé'; ?>" css="style/evenements.css"-->
<div id="content">
    <h1>Ajout d'une entreprise</h1>
    <form action="entreprise-ajouter" method="post">
    <article>
        <dl>
            <dt><label for="name">Nom de l'entreprise</label></dt>
            <dd><input id="name" name="name"/></dd>

            <dt><label for="address1">Adresse 1</label></dt>
            <dd><input id="address1" name="address1"/></dd>

            <dt><label for="address2">Adresse 2</label></dt>
            <dd><input id="address2" name="address2"/></dd>

            <dt><label for="postalCode">Code postal</label></dt>
            <dd><input id="postalCode" name="postalCode"/></dd>

            <dt><label for="city">Ville</label></dt>
            <dd><input id="city" name="city"></dd>

            <dt><label for="country">Pays</label></dt>
            <dd><input id="country" name="country"/></dd>

            <dt><label for="APEcode">Code APE</label></dt>
            <dd>
                <select name="APEcode">
                <?php foreach($codesAPE as $codeAPE)
                        echo '<option value="'.$codeAPE->getCode().'">'.$codeAPE->getCode().' - '.$codeAPE->getLibelle().'</option>';
                    ?>
                </select>
                <a href="codesAPE">Accéder aux codes APE</a>
            </dd>
        </dl>
        <input type="submit" value="Ajouter l'entreprise" />
    </article>
    </form>
</div>
