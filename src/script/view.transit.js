ViewChanger = function (nav, content, src, callBack) {
	this.buttons      = nav.getElementsByTagName('button');
	this.activeButton = nav.getElementsByClassName('active')[0];
	this.activeView   = this.activeButton.getAttribute('data-view');
	this.content      = content;
	this.callBack     = callBack;
	this.src		  = src;
	this.xhr 		  = getXMLHttpRequest();
}
ViewChanger.prototype.init = function () {
	var that = this;
	for(var i=0, l=this.buttons.length; i<l; i++)
		this.buttons[i].addEventListener('click', function(){that.change(this)}, false);
}
ViewChanger.prototype.change = function (el) {
	//console.log(el.getAttribute('data-view'))

	el.classList.add('active');
	this.activeButton.classList.remove('active');
	this.activeButton = el;
	this.activeView=el.getAttribute('data-view');

	this.aGet();
}
ViewChanger.prototype.aGet = function () {
	var that=this;
	if ((this.xhr != null) && (this.xhr != false)) {
		if (this.xhr.readyState == 0 || this.xhr.readyState == 4) {
			this.xhr.open('post', this.src+'&view='+this.activeView, true);
			this.xhr.onreadystatechange = function () {
				if(this.readyState  == 4)
					if (this.status == 200) {
						that.callBack(this.responseText);
					} else
						alert('Une erreur est survenue. Désolé pour l\'inconvénient. ;-) (xhr.status = '+this.status+')');
			};
			this.xhr.send(null);
		} else setTimeout(this.aGet, 500);
	} else if (this.xhr == null)
		alert('Une erreur est survenue. Désolé pour l\'inconvénient. ;-) (xhr = null)');
}