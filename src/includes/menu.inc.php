<?php
//switch ($_SESSION['trombiUser']->getAuth()->getId()) {
		$items = array(
			'profile' => '<a href="index.php?requ=profile" title="Voir son profile"><span>Profile</span></a>',
			'promotions' => '<a href="index.php?requ=promotions" title="Voir sa ou les promotions"><span>Promotions</span></a>',
			'evenements' => '<a href="index.php?requ=evenements" title="Voir les évènements"><span>Évènements</span></a>',
			'recherche' => '<a href="index.php?requ=recherche" title="Faire une recherche..."><span>Recherche</span></a>'
		);
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
	<li><a href="aide.php" target="_blank" title="Perdu ?!"><span>Aide</span></a></li>
	<li<?php echo(($_GET['requ']=='parametres')?' class="active"':'');?>><a href="index.php?requ=parametres" title="Paramètres du compte..."><span>Paramètres</span></a></li>
  	<li><a href="deconnection.php" title="Se déconnecter"><span>Déconnexion</span></a></li>
  </ul>
</header>