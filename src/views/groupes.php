<!--meta title="Liste des groupes" -->

<?php
    foreach($lst as $gr){
?>
    <a id="groupe" href="groupe/<?= $gr->getId(); ?>" title="Voir le groupe"><span><?= $gr->getNom(); ?></span></a><br>
<?php
    }
?>