<!--meta title="<?php echo ($entreprise != NULL)?$entreprise->getNom():'Entreprise non trouvé'; ?>" css="style/evenements.css"-->
<div id="content">
    <?php if ($_SESSION['user_auth']['write'])
    echo '<a class="edit" href="entreprise-editer/'.$_GET['id'].'">Editer...</a>';
    ?>
    <h1>Détails de l'entreprise</h1>
    <article>
        <h3 class="entreprise"><?php echo $entreprise->getNom(); ?></h3>
        <dl>
            <dt>Adresse 1</dt>
            <dd id="adresse1"><?php echo $entreprise->getAdresse1(); ?></dd>
            <dt>Adresse 2</dt>
            <dd id="adresse2"><?php echo $entreprise->getAdresse2(); ?></dd>
            <dt>Code postal</dt>
            <dd id="codePostal"><?php echo $entreprise->getCodePostal(); ?></dd>
            <dt>Ville</dt>
            <dd id="ville"><?php echo $entreprise->getVille(); ?></dd>
            <dt>Pays</dt>
            <dd id="pays"><?php echo $entreprise->getPays(); ?></dd>
            <dt>Code APE</dt>
            <dd id="codeApe">
            <?php
            if($entreprise->getCodeAPE() == NULL) {
                echo "Aucune code APE n'est associé à cette entreprise";
            } else {
                echo $entreprise->getCodeAPE()->getCode().' : '.$entreprise->getCodeAPE()->getLibelle();
            }
            ?>
            </dd>
        </dl>
    </article>
</div>
