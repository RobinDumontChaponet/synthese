<!--meta title="Gestion des comptes utilisateurs" css="style/profil.css"-->
<div id="content">
    <h1>Liste des comptes en fonction des types de profil</h1>

    <?php foreach($lstTypeProfil as $type){ ?>
        <a href="comptes#<?= $type->getLibelle(); ?>"><?= $type->getLibelle(); ?></a>
    <?php } ?>

    <section id="ajouter">
        <form method="POST">
            <article>
                <dt id="nomUsage">Nom</dt>
                <dd><input type="text" name="nom" placeholder="Nom de la personne"></dd>
                <dt id="nomUsage">Prénom</dt>
                <dd><input type="text" name="prenom" placeholder="Prénom de la personne"></dd>
                <dt id="mail">Mail</dt>
                <dd><input type="text" name="mail" placeholder="Mail de la personne"></dd>
                <dt>Type Profil</dt>
                <dd>
                    <select name="profil">
                        <?php foreach($lstTypeProfil as $typeP){ ?>
                            <option value="<?= $typeP->getId(); ?>"><?= $typeP->getLibelle(); ?></option>
                        <?php } ?>
                    </select>
                </dd>
                <dt></dt>
                <dd><input type="submit" name="add" value="Ajouter"></dd>
            </article>
        </form>
    </section>

    <?php foreach($lstTypeProfil as $type){ ?>
    <section id="<?= $type->getLibelle(); ?>">
        <h2><?= $type->getLibelle(); ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Nouveau Mdp</th>
                    <th>Type Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lst[$type->getId()] as $pers){ ?>
                    <form action="" method="POST">
                        <tr>
                            <td style="padding:0;"><?= $pers->getPersonne()->getNom(); ?></td>
                            <td style="padding:0;"><?= $pers->getPersonne()->getPrenom(); ?></td>
                            <td style="padding:0;"><input type="password" name="mdp" placeholder="Remplacer le mot de passe" style="width:220px;"></td>
                            <td style="padding:0;">
                                <select name="profil">
                                    <?php foreach($lstTypeProfil as $typeP){ ?>
                                    <option value="<?= $typeP->getId(); ?>" <?php if($pers->getTypeProfil()->getId()==$typeP->getId()){ ?>selected<?php } ?>><?= $typeP->getLibelle(); ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td style="padding:0;">
                                <input type="hidden" name="id" value="<?= $pers->getId(); ?>"><input type="submit" value="modifier" name="mod">
                                <a href="profil/<?= $pers->getPersonne()->getId(); ?>">Voir le profil</a>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <?php } ?>
</div>
