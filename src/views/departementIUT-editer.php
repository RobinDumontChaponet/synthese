<!--meta title="Editer un département IUT" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write'] && isset($_GET['id'])) {
		if (isset($error) && $error) {
			echo '<p class="error">Vous devez renseigner tous les champs</p>';
		} ?>
		<?php if ($departementIUT != NULL) {?>
			<h1>Edition d'un département IUT</h1>
			<form action="departementIUT-editer/<?php echo $_GET['id']; ?>" method="post">
				<article>
					<dl>
						<dt><label for="nom">Nom du département</label></dt>
						<dd><input type="text" id="nom" name="nom" placeholder="Nom du département IUT" value="<?php if(empty($_POST)) { echo $departementIUT->getNom(); } else { echo $_POST['nom'];}?>" autofocus/></dd>
						<dt><label for="sigle">Sigle</label></dt>
						<dd><input type="text" id="sigle" name="sigle" placeholder="Sigle du département" value="<?php if(empty($_POST)) { echo $departementIUT->getSigle(); } else { echo $_POST['sigle'];}?>" autofocus/></dd>
					</dl>
				</article>
				<input type="submit" value="Editer" />
				<script>backButton()</script>
			</form>
			<?php } else {
				echo 'Aucun département trouvé avec cet ID';
			}
		}?>
	</div>