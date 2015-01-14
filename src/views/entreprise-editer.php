<!--meta title="Modifier <?php echo ($entreprise != NULL)?$entreprise->getNom():'Entreprise non trouvé'; ?>" css="style/evenements.css"-->
<div id="content">
    <?php
        if(isset($error)){
    ?>
            <p class="error"><?= $error; ?></p>
    <?php
        }
    ?>
    <h1>Modification de l'entreprise</h1>
    <?php if ($entreprise != NULL) { ?>
    <form method="post">
        <article>
            <h3 class="entreprise"><input id="entrepriseNom" name="entrepriseNom" type="text" placeholder="Pas de libelle..." value="<?php echo $entreprise->getNom(); ?>" autofocus/></h3>
            <dl>
                <dt>Adresse 1</dt>
                <dd id="adresse1"><input id="entrepriseAd1" name="entrepriseAd1" type="text" placeholder="Pas d'adresse..." value="<?php echo $entreprise->getAdresse1(); ?>" /></dd>
                <dt>Adresse 2</dt>
                <dd id="adresse2"><input id="entrepriseAd2" name="entrepriseAd2" type="text" placeholder="Pas d'adresse..." value="<?php echo $entreprise->getAdresse2(); ?>"/></dd>
                <dt>Code postal</dt>
                <dd id="codePostal"><input id="entrepriseCp" name="entrepriseCp" type="text" placeholder="Pas de code postal..." value="<?php echo $entreprise->getCodePostal(); ?>" /></dd>
                <dt>Ville</dt>
                <dd id="ville"><input id="entrepriseVille" name="entrepriseVille" type="text" placeholder="Pas de ville..." value="<?php echo $entreprise->getVille(); ?>" /></dd>
                <dt>Pays</dt>
                <dd id="pays">
                    <select name="entreprisePays" id="entreprisePays">
                        <option value="<?php echo $entreprise->getPays(); ?>" selected><?php echo $entreprise->getPays(); ?></option>
                        <?php
                            foreach($lstPays as $pays){
                        ?>
                            <option value="<?= $pays; ?>"><?= $pays; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </dd>
                <dt>Code APE</dt>
                <dd id="codeApe">
                    <select name="entrepriseCodeApe" id="entrepriseCodeApe">
                        <?php
                            foreach($lstCodeApe as $code){
                        ?>
                            <option value="<?= $code->getCode(); ?>" <?php if($code->getCode()==$entreprise->getCodeAPE()->getCode()){ ?>selected<?php } ?>><?= $code->getCode().' : '.$code->getLibelle(); ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </dd>
            </dl>
        </article>
        <input type="submit" value="Enregistrer les modifications" />
    </form>
    <?php } else { ?>
    <p class="warning">Cette entreprise n'existe pas</p>
    <?php } ?>
</div>
