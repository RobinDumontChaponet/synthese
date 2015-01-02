<?php
require_once(MODELS_INC.'GroupeDAO.class.php');

switch ($_SESSION["syntheseUser"]->getTypeProfil()->getId()) {
	case 1: // isAdmin_
		$items = array(
			//'profil' => '<a id="aProfil" href="profil" title="Voir son profil"><span>Profil</span></a>',
			'promotions' => '<a id="aPromo" href="promotions" title="Voir sa ou les promotions"><span>Promotions</span></a>',
			'evenements' => '<a id="aEvents" href="evenements" title="Voir les évènements"><span>Évènements</span></a>',
			'recherche' => '<a id="aSearch" href="recherche" title="Faire une recherche..."><span>Recherche</span></a>'
		);
	break;
	case 2: // isTeacher_
		$items = array(
			'profil' => '<a id="aProfil" href="profil" title="Voir son profil"><span>Profil</span></a>',
			'promotions' => '<a id="aPromo" href="promotions" title="Voir sa ou les promotions"><span>Promotions</span></a>',
			'evenements' => '<a id="aEvents" href="evenements" title="Voir les évènements"><span>Évènements</span></a>',
			'recherche' => '<a id="aSearch" href="recherche" title="Faire une recherche..."><span>Recherche</span></a>'
		);
	break;
	case 3: // isFormerStudent_
		$items = array(
			'profil' => '<a id="aProfil" href="profil" title="Voir son profil"><span>Profil</span></a>',
			'promotions' => '<a id="aPromo" href="promotions" title="Voir sa ou les promotions"><span>Promotions</span></a>',
			'evenements' => '<a id="aEvents" href="evenements" title="Voir les évènements"><span>Évènements</span></a>',
			'recherche' => '<a id="aSearch" href="recherche" title="Faire une recherche..."><span>Recherche</span></a>'
		);
	break;

}
$items['creerGroupe']= '<a id="creerGroupe" href="creerGroupe" title="Créer un groupe"><span>Créer un groupe</span></a>';
foreach(GroupeDAO::getGroupeByPersonne($_SESSION["syntheseUser"]->getPersonne()) as $groupe)
    $items['groupe'.$groupe->getId()] = '<a id="groupe" href="groupe/'.$groupe->getId().' " title="Voir le groupe"><span>'.$groupe->getNom().'</span></a>';

?>
<header>
  <h1 <?php if($_GET['requ']=='index' || $_GET['requ']=='') echo' class="active"';?>><a href="index.php" title="Accueil">connectIT!</a></h1>
  <nav>
	<ul>
<?php
foreach($items as $key => $item)
	echo '	  <li'.(($_GET['requ']==$key)?' class="active"':'').'>'.$item.'</li>'."\n";
?>
	</ul>
  </nav>
  <ul>
	<li><a id="aHelp" href="aide.php" target="_blank" title="Activer/Désactiver l'aide" onclick="toggleHelp();return false;"><span>Aide</span></a></li>
	<li<?php echo(($_GET['requ']=='parametres')?' class="active"':'');?>><a id="aParams" href="parametres" title="Paramètres du compte..."><span>Paramètres</span></a></li>
  	<li><a id="aOut" href="deconnection.php" title="Se déconnecter"><span>Déconnexion</span></a></li>
  </ul>
</header>
<menu type="context" id="menuEvent">
	<menuitem label="Éditer l'évènement" onclick="goTo('evenement-editer/'+getUrlId())">Éditer l'évènement</menuitem>
	<menuitem label="Supprimer l'évènement" onclick="goTo('evenement-supprimer/'+getUrlId())">Supprimer l'évènement</menuitem>
</menu>
<menu type="context" id="menuProfil">
	<menuitem label="Éditer le profil" onclick="goTo('profil-editer/'+getUrlId())">Éditer le profil</menuitem>
</menu>
<menu type="context" id="menuDiplomes">
	<menuitem label="Éditer les diplômes" onclick="goTo('profil-editer/'+getUrlId(), 'diplomes')">Éditer les diplômes</menuitem>
</menu>
<menu type="context" id="menuEntreprises">
	<menuitem label="Éditer les entreprises" onclick="goTo('profil-editer/'+getUrlId(), 'entreprises')">Éditer les entreprises</menuitem>
</menu>
<?php /* NON IMPLEMENTÉ(s)_

<menu type="context" id="menuDiplome">
	<menuitem label="Éditer le diplôme" onclick="goTo('diplome-editer/'+getUrlId())">Éditer le diplôme</menuitem>
</menu>
<menu type="context" id="menuEntreprise">
	<menuitem label="Éditer l'entreprise" onclick="goTo('entreprise-editer/'+getUrlId())">Éditer l'entreprise</menuitem>
</menu>
<menu type="context" id="menuEtablissement">
	<menuitem label="Éditer l'établissement" onclick="goTo('etablissement-editer/'+getUrlId())">Éditer l'établissement</menuitem>
</menu>
*/ ?>