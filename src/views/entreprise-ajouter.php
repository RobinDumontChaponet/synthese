<!--meta title="Ajouter une entreprise" css="style/evenements.css"-->
<div id="content">
    <?php  
    if ($error)
        echo '<p class="error">Vous devez renseigner correctement tout les champs</p>';
    if ($errorCedex)
         echo '<p class="error">Le cedex est invalide</p>';
    if ($errorCedex)
         echo '<p class="error">Le numéro de téléphone est invalide</p>';
    ?>
    <h1>Ajout d'une entreprise</h1>
    <article>
        <form action="entreprise-ajouter" method="post">
        <dl>
            <dt><label for="name">Nom de l'entreprise</label></dt>
            <dd><input id="name" name="name" type="text"/></dd>

            <dt><label for="address1">Adresse 1</label></dt>
            <dd><input id="address1" name="address1" type="text"/></dd>

            <dt><label for="address2">Adresse 2</label></dt>
            <dd><input id="address2" name="address2" type="text"/></dd>

            <dt><label for="postalCode">Code postal</label></dt>
            <dd><input id="postalCode" name="postalCode" type="text"/></dd>

            <dt><label for="city">Ville</label></dt>
            <dd><input id="city" name="city" type="text"/></dd>

            <dt><label for="cedex">Cedex</label></dt>
            <dd><input id="cedex" name="cedex" type="text"/></dd>

            <dt><label for="country">Pays</label></dt>
            <dd><input id="country" name="country" type="text"/></dd>

            <dt><label for="phoneNumber">Téléphone</label></dt>
            <dd><input id="phoneNumber" name="phoneNumber" type="text"/></dd>

            <dt><label for="APEcode">Code APE</label></dt>
            <dd>
                <select id="APEcode" name="APEcode">
                <?php foreach($codesAPE as $codeAPE)
                    echo '<option value="'.$codeAPE->getCode().'">'.$codeAPE->getCode().' - '.$codeAPE->getLibelle().'</option>';
                ?>
                </select>
                <a href="codesAPE">Accéder aux codes APE</a>
            </dd>
        </dl>
        <input type="submit" value="Ajouter l'entreprise" />
        </form>
    </article>
</div>
