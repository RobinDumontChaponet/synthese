<?php

//require_once(MODELS_INC.'GroupeDAO.class.php');

switch ($_SESSION["syntheseUser"]->getTypeProfil()->getId()) {
	case 1: // isAdmin_
		$items = array(
			'promotion, promotions, csv-import' => array(
				(object)array('href'=>'promotions', 'class'=>'aPromo', 'title'=>'Voir les promotions', 'inner'=>'Promotions'),
				(object)array('href'=>'promotions', 'class'=>'aPromo', 'title'=>'Voir les promotions', 'inner'=>'Promotions'),
				(object)array('href'=>'csv-import', 'class'=>'aAdd', 'title'=>'Ajouter une promotions', 'inner'=>'Importer')
			),
			'evenements, evenement-ajouter' => array(
				(object)array('href'=>'evenements', 'class'=>'aEvents', 'title'=>'Voir les évènements', 'inner'=>'Évènements'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements inscrits', 'inner'=>'Inscrits', 'scroll'=>'inscrits'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements à venir', 'inner'=>'À venir', 'scroll'=>'a_venir'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements passés', 'inner'=>'Passés', 'scroll'=>'passes'),
				(object)array('href'=>'evenement-ajouter', 'class'=>'aAdd', 'title'=>'Ajouter un évènement', 'inner'=>'Ajouter')
			),
			'groupes, groupe, creerGroupe' => array(
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir les groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir les groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupe-ajouter', 'class'=>'aAdd', 'title'=>'Ajouter un groupe', 'inner'=>'Ajouter')
			),
			(object)array('href'=>'recherche', 'class'=>'aSearch', 'title'=>'Faire une recherche...', 'inner'=>'Recherche')
		);
	break;
	case 2: // isTeacher_
		$items = array(
			'profil' => array(
				(object)array('href'=>'profil', 'class'=>'aProfil', 'title'=>'Voir son profil', 'inner'=>'Profil'),
				(object)array('href'=>'profil', 'class'=>'aProfil', 'title'=>'Voir son profil', 'inner'=>'Profil'),
				(object)array('href'=>'profil', 'class'=>'aAnchor', 'title'=>'Voir les diplomes', 'inner'=>'Diplomes', 'scroll'=>'diplomes'),
				(object)array('href'=>'profil', 'class'=>'aAnchor', 'title'=>'Voir les entreprises', 'inner'=>'Entreprises', 'scroll'=>'entreprises')
			),
			(object)array('href'=>'promotions', 'class'=>'aPromo', 'title'=>'Voir les promotions', 'inner'=>'Promotions'),
			'evenements, evenement-ajouter' => array(
				(object)array('href'=>'evenements', 'class'=>'aEvents', 'title'=>'Voir les évènements', 'inner'=>'Évènements'),
				(object)array('href'=>'evenements', 'class'=>'aEvents', 'title'=>'Voir les évènements', 'inner'=>'Évènements'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements inscrits', 'inner'=>'Inscrits', 'scroll'=>'inscrits'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements autres', 'inner'=>'Autres', 'scroll'=>'autres'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements passés', 'inner'=>'Passés', 'scroll'=>'passes'),
				(object)array('href'=>'evenement-ajouter', 'class'=>'aAdd', 'title'=>'Ajouter un évènement', 'inner'=>'Ajouter')
			),
			'groupes, groupe, creerGroupe' => array(
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir les groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir les groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupe-ajouter', 'class'=>'aAdd', 'title'=>'Ajouter un groupe', 'inner'=>'Ajouter')
			),
			(object)array('href'=>'recherche', 'class'=>'aSearch', 'title'=>'Faire une recherche...', 'inner'=>'Recherche')
		);
	break;
	case 3: // isFormerStudent_
		$items = array(
			'profil' => array(
				(object)array('href'=>'profil', 'class'=>'aProfil', 'title'=>'Voir son profil', 'inner'=>'Profil'),
				(object)array('href'=>'profil', 'class'=>'aProfil', 'title'=>'Voir son profil', 'inner'=>'Profil'),
				(object)array('href'=>'profil', 'class'=>'aAnchor', 'title'=>'Voir les diplomes', 'inner'=>'Diplomes', 'scroll'=>'diplomes'),
				(object)array('href'=>'profil', 'class'=>'aAnchor', 'title'=>'Voir les entreprises', 'inner'=>'Entreprises', 'scroll'=>'entreprises')
			),
			'promotion, promotions' => array(
				(object)array('href'=>'promotion', 'class'=>'aPromo', 'title'=>'Voir sa et les promotions', 'inner'=>'Promotions'),
				(object)array('href'=>'promotion', 'class'=>'aPromo', 'title'=>'Voir sa promotion', 'inner'=>'Ma promotion'),
				(object)array('href'=>'promotions', 'class'=>'aPromo', 'title'=>'Voir les promotions', 'inner'=>'Toutes')
			),
			'evenements, evenement-ajouter' => array(
				(object)array('href'=>'evenements', 'class'=>'aEvents', 'title'=>'Voir les évènements', 'inner'=>'Évènements'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements inscrits', 'inner'=>'Inscrits', 'scroll'=>'inscrits'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements autres', 'inner'=>'Autres', 'scroll'=>'autres'),
				(object)array('href'=>'evenements', 'class'=>'aAnchor', 'title'=>'Voir les évènements passés', 'inner'=>'Passés', 'scroll'=>'passes')
			),
			'groupes, groupe, creerGroupe' => array(
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir ses groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupes', 'class'=>'aGroups', 'title'=>'Voir ses groupes', 'inner'=>'Groupes'),
				(object)array('href'=>'groupe-ajouter', 'class'=>'aAdd', 'title'=>'Ajouter un groupe', 'inner'=>'Ajouter')
			),
			(object)array('href'=>'recherche', 'class'=>'aSearch', 'title'=>'Faire une recherche...', 'inner'=>'Recherche')
		);
	break;
}
?>
<header>
  <h1 <?php if($_GET['requ']=='index' || $_GET['requ']=='') echo' class="active"';?>><a href="index.php" title="Accueil"><span>connect</span>IT!</a></h1>
  <nav>
<?php
$menu = '';
$shutterOn = false;
$sameReferrer = false;
foreach($items as $key => $item)
	if(gettype($item)=='array') {
		$first = each($item);
		$explode = explode(', ', $key);
		if(in_array($_GET['requ'], $explode)) {
			$shutterOn = true;

			if(isset($_SESSION['referrer']) and in_array($_SESSION['referrer'], $explode))
				$sameReferrer = true;

			$menu .= '	  <li class="active"><a href="'.$first['value']->href.'" class="'.$first['value']->class.'" title="'.$first['value']->title.'"><span>'.$first['value']->inner.'</span></a></li>'."\n";

			$menu .= '	  <nav class="shutter"><ul>';
			array_shift($item);
			foreach($item as $key => $shutter)
				$menu .= '	  	<li'.(($_GET['requ']==$shutter->href && !isset($shutter->scroll))?' class="active"':'').'><a href="'.$shutter->href.((isset($shutter->scroll))?'#'.$shutter->scroll:'').'" class="'.$shutter->class.'" title="'.$shutter->title.'"'.((isset($shutter->scroll) && $_GET['requ']==$shutter->href)?' data-scroll':'').'><span>'.$shutter->inner.'</span></a></li>'."\n";
			$menu .= '</ul></nav>';
		} else
			$menu .= '	  <li'.(($_GET['requ']==$first['value']->href)?' class="active"':'').'><a href="'.$first['value']->href.'" class="'.$first['value']->class.'" title="'.$first['value']->title.'"><span>'.$first['value']->inner.'</span></a></li>'."\n";
	} else
		$menu .= '	  <li'.(($_GET['requ']==$item->href)?' class="active"':'').'><a href="'.$item->href.'" class="'.$item->class.'" title="'.$item->title.'"><span>'.$item->inner.'</span></a></li>'."\n";

?>
	<ul class="<?= (($shutterOn)?' shutterOn':'').((!$sameReferrer)?' shutterAnimate':'');?>">
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