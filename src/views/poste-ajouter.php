<!--meta title="Ajouter un poste" css="style/evenements.css"-->
<div id="content">
	<h1>Ajouter un poste</h1>
	<form action="poste-ajouter" method="post">
		<article>
			<dl>
				<dt><label for="name">Nom</label></dt>
				<dd class="poste"><input id="name" name="name" type="text"></dd>
			</dl>
		</article>
		<input type="submit" value="Ajouter" />
		<script>backButton()</script>
	</form>
</div>