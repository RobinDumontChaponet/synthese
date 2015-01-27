<?php
require_once(MODELS_INC."GroupeDAO.class.php");
require_once(MODELS_INC."PostDAO.class.php");
require_once(MODELS_INC."CommentaireDAO.class.php");
if (isset($_GET['id'])) {
	//Récupération du groupe
	$groupe=GroupeDAO::getById($_GET['id']);

	if (isset($_POST['publier'])) {
		$nouveauPost=new Post(1, $_SESSION["syntheseUser"]->getPersonne(), date("Y-m-d H:i:s"), $_POST['contenu'], true, array());
		PostDAO::create($nouveauPost);
		PostDAO::publieGroupe($nouveauPost, $groupe);
	} elseif (isset($_POST['addCom'])) {
		$commentaire=new Commentaire(1, $_SESSION["syntheseUser"]->getPersonne(), $_POST['idPost'], date("Y-m-d H:i:s"), $_POST['contenu']);
		CommentaireDAO::create($commentaire);
	}

	if($groupe!=null)
		$posts=PostDAO::getByGroupe($groupe);

} else {
	$posts=null;
	$groupe=null;
}
include(VIEWS_INC.'groupe.php');

?>
