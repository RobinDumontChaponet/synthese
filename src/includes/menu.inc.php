<?php
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