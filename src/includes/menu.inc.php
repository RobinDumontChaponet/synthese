<?php

//require_once(MODELS_INC.'GroupeDAO.class.php');

switch ($_SESSION["syntheseUser"]->getTypeProfil()->getId()) {
	case 1: // isAdmin_
		$items = array(
			//'profil' => '<a class="aProfil" href="profil" title="Voir son profil"><span>Profil</span></a>',
			'promotions' => '<a class="aPromo" href="promotions" title="Voir sa ou les promotions"><span>Promotions</span></a>',
			'evenements' => '<a class="aEvents" href="evenements" title="Voir les évènements"><span>Évènements</span></a>',
			'groupes' => '<a class="aGroups" href="groupes" title="Voir les groupes"><span>Groupes</span></a>',
			'recherche' => '<a class="aSearch" href="recherche" title="Faire une recherche..."><span>Recherche</span></a>'
		);
	break;
	case 2: // isTeacher_
		$items = array(
			'profil' => '<a class="aProfil" href="profil" title="Voir son profil"><span>Profil</span></a>',
			'promotions' => '<a class="aPromo" href="promotions" title="Voir sa ou les promotions"><span>Promotions</span></a>',
			'evenements' => '<a class="aEvents" href="evenements" title="Voir les évènements"><span>Évènements</span></a>',
			'creerGroupe' => '<a class="aGroups" href="creerGroupe" title="Voir mes groupes"><span>Groupes</span></a>',
			'recherche' => '<a class="aSearch" href="recherche" title="Faire une recherche..."><span>Recherche</span></a>'
		);
	break;
	case 3: // isFormerStudent_
		$items = array(
			(object)array('href'=>'profil', 'class'=>'aProfil', 'title'=>'Voir son profil', 'inner'=>'Profil'),
			'promotion, promotions' => array(
				(object)array('href'=>'promotion', 'class'=>'aPromo', 'title'=>'Voir sa et les promotions', 'inner'=>'Promotions'),
				(object)array('href'=>'promotion', 'class'=>'aPromo', 'title'=>'Voir sa promotion', 'inner'=>'Ma promotion'),
				(object)array('href'=>'promotions', 'class'=>'aPromo', 'title'=>'Voir les promotions', 'inner'=>'Toutes')
			),
			(object)array('href'=>'evenements', 'class'=>'aEvents', 'title'=>'Voir les évènements', 'inner'=>'Évènements'),
			'groupes, groupe, creerGroupe' => array(
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir ses groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir ses groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'creerGroupe', 'class'=>'aGroups', 'title'=>'Créer un groupe', 'inner'=>'Créer un groupe')
			),
			(object)array('href'=>'recherche', 'class'=>'aSearch', 'title'=>'Faire une recherche...', 'inner'=>'Recherche')
		);
	break;

}
/*$items['creerGroupe']= '<a id="creerGroupe" href="creerGroupe" title="Créer un groupe"><span>Créer un groupe</span></a>';
foreach(GroupeDAO::getGroupeByPersonne($_SESSION["syntheseUser"]->getPersonne()) as $groupe)
    $items['groupe'.$groupe->getId()] = '<a id="groupe" href="groupe/'.$groupe->getId().' " title="Voir le groupe"><span>'.$groupe->getNom().'</span></a>';*/
?>
<header>
  <h1 <?php if($_GET['requ']=='index' || $_GET['requ']=='') echo' class="active"';?>><a href="index.php" title="Accueil">connectIT!</a></h1>
  <nav>
<?php
$menu = '';
$shutterOn = false;
foreach($items as $key => $item)
	if(gettype($item)=='array') {
		$first = each($item);
		$menu .= '	  <li'.(($_GET['requ']==$first['value']->href)?' class="active"':'').'><a href="'.$first['value']->href.'" class="'.$first['value']->class.'" title="'.$first['value']->title.'"><span>'.$first['value']->inner.'</span></a></li>'."\n";

		if(in_array($_GET['requ'], explode(', ', $key))) {

			$shutterOn = true;

			$menu .= '<nav class="shutter"><ul>';
			array_shift($item);
			foreach($item as $key => $shutter)
				$menu .= '	  <li'.(($_GET['requ']==$shutter->href)?' class="active"':'').'><a href="'.$shutter->href.'" class="'.$shutter->class.'" title="'.$shutter->title.'"><span>'.$shutter->inner.'</span></a></li>'."\n";
			$menu .= '</ul></nav>';
		}
	} else
		$menu .= '	  <li'.(($_GET['requ']==$item->href)?' class="active"':'').'><a href="'.$item->href.'" class="'.$item->class.'" title="'.$item->title.'"><span>'.$item->inner.'</span></a></li>'."\n";

?>
	<ul<?= ($shutterOn)?' class="shutterOn"':''; ?>>
		<?= $menu; ?>
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