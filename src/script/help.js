function toggleHelp() {
	document.body.classList.toggle('show-help');
	var xhr = new XMLHttpRequest();
	var state=document.body.classList.contains('show-help');
	console.log('helpers/help.php?set='+state);
	xhr.open('GET', 'helpers/help.php?set='+state, true);
	xhr.send(null);
	return false;
}