<?php
//switch ($_SESSION['trombiUser']->getAuth()->getId()) {
		$items = array(
			'profile' => '<a href="index.php?requ=profile" title="Voir son profil"><span>Profil</span></a>',
			'promo' => '<a href="index.php?requ=promo" title="Voir sa promo"><span>Promo</span></a>',
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
	<li><a href="aide.php" target="_blank" title="Je suis perdu !"><span>Aide</span></a></li>
  	<li><a href="deconnection.php" title="Se déconnecter"><span>Déconnexion</span></a></li>
  </ul>
</header>