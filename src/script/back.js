function backButton () {
	if (document.referrer != '')
		document.write('<a class="getback "href="javascript:history.back()">Retour</a>');
}