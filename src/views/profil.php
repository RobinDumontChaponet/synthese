<!--meta title="<?php if ($ancien != NULL){echo 'Profil de '.$ancien->getNomPatronymique().$ancien->getPrenom();} else {echo 'Profil non trouvé';}?>" css="style/profil.css"-->
<div id="content">
<?php
if (isset($ancien) && $ancien != NULL) {?>
	<figure>
		<?php if ($imageProfil != NULL)	//	Si il y a une image de profil
			echo '<img height="230px" width="200px" src="helpers/imageProfil.php?id='.$ancien->getId().'" alt="Image de profil"/>';
		else
			echo '<img src="style/images/nobody.png" alt="Pas d\'image de profil"/>';
		if ($imageTrombi != NULL)	//	Si il y a une image de trombi
			echo '<img height="230px" width="200px" src="helpers/imageTrombi.php?id='.$ancien->getId().'" alt="Image de trombinoscope"/>';
		else
			echo '<img src="style/images/nobody.png" alt="Pas d\'image de trombinoscope"/>';?>
		<!--<input type="file" name="imageProfil"/>-->
	</figure>
	<h1><?php echo $ancien->getPrenom()?> <span class="nomPatronymique"><?php echo $ancien->getNomPatronymique() ?></span>
	<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
		echo '<a class="edit" href="profil-editer/'.$ancien->getId().'" title="Éditer le profil...">Éditer...</a>';
	?></h1>
	<section id="info"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuProfil"';?>>
		<h2>Informations générales</h2>
		<dl>
			<dt id="nomUsage">Nom d'usage</dt>
			<dd><?php echo $ancien->getNom();?></dd>
			<dt id="sexe<?php echo strtoupper($ancien->getSexe());?>">Sexe</dt>
			<dd><?php echo ($ancien->getSexe() == 'm')?'Homme':(($ancien->getSexe() == 'f')?'Femme':'Sexe');?></dd>
			<dt id="dateNaissance">Date de naissance</dt>
			<dd><?php echo $ancien->getDateNaissance();?></dd>
			<dt id="adresse1">Adresse 1</dt>
			<dd><?php echo $ancien->getAdresse1();?></dd>
			<dt id="adresse2">Adresse 2</dt>
			<dd><?php echo $ancien->getAdresse2();?></dd>
			<dt id="codePostal">Code postal</dt>
			<dd><?php echo $ancien->getCodePostal();?></dd>
			<dt id="ville">Ville</dt>
			<dd><?php echo $ancien->getVille();?></dd>
			<dt id="pays">Pays</dt>
			<dd><?php echo $ancien->getPays(); ?></dd>
			<dt id="telephoneFixe">Telephone</dt>
			<dd><a href="tel:<?php echo $ancien->getTelephone();?>"><?php echo $ancien->getTelephone();?></a></dd>
			<dt id="telephoneMobile">Mobile</dt>
			<dd><a href="tel:<?php echo $ancien->getMobile();?>"><?php echo $ancien->getMobile();?></a></dd>
			<dt id="mail">Mail</dt>
			<dd><a href="mailto:<?php echo $ancien->getMail();?>"><?php echo $ancien->getMail();?></a></dd>

		</dl>
	</section>


    <?php
        if($ancien->getParents()!=NULL && ($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write'] || $_SESSION['syntheseUser']->getTypeProfil()->getId()==2)){
    ?>
        <section id="parents"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuParents"';?>>
            <?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
                echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#parents" title="Éditer le profil...">Éditer...</a>';
            ?>

            <h2>Parents</h2>
            <ul>
                <li>
                    <dl>
                        <dt id="adresse1">Adresse 1</dt>
                        <dd><?php echo $ancien->getParents()->getAdresse1();?></dd>
                        <dt id="adresse2">Adresse 2</dt>
                        <dd><?php echo $ancien->getParents()->getAdresse2();?></dd>
                        <dt id="codePostal">Code postal</dt>
                        <dd><?php echo $ancien->getParents()->getCodePostal();?></dd>
                        <dt id="ville">Ville</dt>
                        <dd><?php echo $ancien->getParents()->getVille();?></dd>
                        <dt id="pays">Pays</dt>
                        <dd><?php echo $ancien->getParents()->getPays(); ?></dd>
                        <dt id="telephoneFixe">Telephone</dt>
                        <dd><a href="tel:<?php echo $ancien->getParents()->getTelephone();?>"><?php echo $ancien->getParents()->getTelephone();?></a></dd>
                        <dt id="telephoneMobile">Mobile</dt>
                        <dd><a href="tel:<?php echo $ancien->getParents()->getMobile();?>"><?php echo $ancien->getParents()->getMobile();?></a></dd>
                   </dl>
                </li>
            </ul>
        </section>
    <?php
        }
    ?>


	<section id="diplomes"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuDiplomes"';?>>
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#diplomes" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Diplômes</h2>
		<table>
		    <thead>
		        <tr>
		            <th>Diplome</th>
                    <th>Département</th>
                    <th>Promotion</th>
		        </tr>
		    </thead>
            <tbody>
<?php
	if ($diplomeDUT != NULL) { // Ne peut être modifié, fixe et normalement présent
?>
			<tr>
				<td><?php echo $diplomeDUT->getDiplomeDUT()->getLibelle();?></td>
				<td><?php echo $diplomeDUT->getDepartementIUT()->getNom();?></td>
				<td><?php echo $diplomeDUT->getPromotion()->getAnnee();?></td>
			</tr>
<?php
	}else{ ?>
            <tr>
                <td colspan="3">Aucun diplome IUT n'est associé à cet ancien.</td>
            </tr>
<?php } ?>
            </tbody>
		</table>
        <br>
		<h2>Diplômes post-DUT</h2>

        <table>
            <thead>
                <tr>
                    <th>Diplome</th>
                    <th>Etablissement</th>
                    <th>Résultat</th>
                    <th>Période</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($diplomesPost != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		              foreach($diplomesPost as $diplomePost) { ?>
                        <tr>
                            <td><a href="diplome/<?php echo $diplomePost->getDiplomePostDUT()->getId();?>"><?php echo $diplomePost->getDiplomePostDUT()->getLibelle();?></a> (<?php echo $diplomePost->getDiplomePostDUT()->getDomaine()->getLibelle();?>)</td>
                            <td><a href="etablissement/<?php echo $diplomePost->getEtablissement()->getId();?>"><?php echo $diplomePost->getEtablissement()->getNom();?></a></td>
                            <td><?php echo $diplomePost->getResultat();?></td>
                            <td><?php echo substr($diplomePost->getDateDebut(), 0, 4);?> - <?php echo substr($diplomePost->getDateFin(), 0, 4);?></td>
                        </tr>
                <?php } } ?>
                <?php if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) { ?>
                    <tr>
                        <td colspan="4"><a class="add" href="diplome-selectionner/<?php echo $ancien->getId();?>">Ajouter un nouveau diplôme post-DUT</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
<?php if($diplomeDUT==null && $diplomesPost==null) { ?>
		<p class="sad">Aucun diplôme.</p>
<?php } ?>
	</section>
	<section id="entreprises"<?php if($_SESSION['syntheseUser']->getId()==$ancien->getId() || $_SESSION['user_auth']['write']) echo ' contextmenu="menuEntreprises"';?>>
		<?php if($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write'])
			echo '<a class="edit" href="profil-editer/'.$ancien->getId().'#entreprises" title="Éditer le profil...">Éditer...</a>';
		?>
		<h2>Entreprises</h2>
		<table>
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Poste</th>
                    <th>Période</th>
                </tr>
            </thead>
            <tbody>
<?php
	if($entreprises != NULL) { // Il faudra faire quelque chose pour pouvoir les modifiers, soit là, soit sur une autre page
		foreach($entreprises as $entreprise) {
?>
			<tr>
				<td><a href="entreprise/<?php echo $entreprise->getEntreprise()->getId()?>"><?php echo $entreprise->getEntreprise()->getNom();?></a></td>
				<td><?php echo $entreprise->getPoste()->getLibelle();?></td>
				<td><?php echo $entreprise->getDateEmbaucheDeb()?> à <?php if($entreprise->getDateEmbaucheFin() == NULL) echo 'maintenant'; else echo $entreprise->getDateEmbaucheFin()?></td>
			</tr>
<?php
		}
		if ($_SESSION['syntheseUser']->getId() == $ancien->getId() || $_SESSION['user_auth']['write']) { ?>
			<tr>
                <td colspan="3"><a class="add" href="entreprise-ajouter/<?php echo $ancien->getId();?>">Ajouter une nouvelle entreprise</a></td>
			</tr>
		<?php }?>

<?php
	} else {
?>
		<p class="sad">Aucune entreprise.</p>
<?php
	}
?>
        </tbody>
    </table>
	</section>
<?php
	} else {
?>
	<p class="warning">Ce profil n'existe pas</p>
<?php }?>
</div>
