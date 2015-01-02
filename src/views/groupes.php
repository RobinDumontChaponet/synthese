<!--meta title="Liste des groupes" -->
<div id="content">
<?php
foreach($groupes as $groupe)
	echo '<a href="groupe/'.$groupe->getId().'" title="Voir le groupe">'.$groupe->getNom().'</a>';
?>
</div>