<!--meta title="Gestion des comptes utilisateurs"-->
<div id="content">
    <h1>Liste des comptes</h1>

	<section id="ajouter">
		<h2>Ajouter un compte</h2>
		<form method="POST">
			<article>
				<dl>
	                <dt id="nomUsage">Nom</dt>
	                <dd><input type="text" name="nom" placeholder="Nom de la personne"></dd>
	                <dt id="nomUsage">Prénom</dt>
	                <dd><input type="text" name="prenom" placeholder="Prénom de la personne"></dd>
	                <dt id="mail">Mail</dt>
	                <dd><input type="text" name="mail" placeholder="Mail de la personne"></dd>
	                <dt class="type">Type Profil</dt>
	                <dd>
	                    <select name="profil">
	                        <?php foreach ($lstTypeProfil as $typeP) { ?>
	                            <option value="<?php echo $typeP->getId(); ?>"><?php echo $typeP->getLibelle(); ?></option>
	                        <?php } ?>
	                    </select>
	                </dd>
				</dl>
            </article>
            <input type="submit" name="add" value="Ajouter">
        </form>
    </section>

    <?php foreach ($lstTypeProfil as $type) { ?>
    <section id="<?php echo $type->getLibelle(); ?>">
        <h2><?php echo $type->getLibelle(); ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Nouveau Mot-de-passe</th>
                    <th>Type de Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lst[$type->getId()] as $pers) { ?>
                    <form action="" method="POST">
                        <tr>
                            <td style="padding:0;"><?php echo $pers->getPersonne()->getNom(); ?></td>
                            <td style="padding:0;"><?php echo $pers->getPersonne()->getPrenom(); ?></td>
                            <td style="padding:0;"><input type="password" name="mdp" placeholder="Remplacer le mot de passe" style="width:220px;"></td>
                            <td style="padding:0;">
                                <select name="profil">
                                    <?php foreach ($lstTypeProfil as $typeP) { ?>
                                    <option value="<?php echo $typeP->getId(); ?>" <?php if ($pers->getTypeProfil()->getId()==$typeP->getId()) { ?>selected<?php } ?>><?php echo $typeP->getLibelle(); ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td style="padding:0;">
                                <input type="hidden" name="id" value="<?php echo $pers->getId(); ?>"><input type="submit" value="modifier" name="mod">
                                <a href="profil/<?php echo $pers->getPersonne()->getId(); ?>">Voir le profil</a>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <?php } ?>
</div>
