// UTILs - TRANSIT.js - r-dc_ 2010


function getPosTop(el){
	var offset = 0;
	while(el) {
		offset += el["offsetTop"];
		el = el.offsetParent;
	}
	return offset;
}
function isVisible(elt) {
	if (!elt) {
		return false;
	}
	var posTop = getPosTop(elt)+10;
	var posBottom = posTop + elt.offsetHeight;
	var visibleTop = (document.body.scrollTop?document.body.scrollTop:document.body.scrollTop);
	var visibleBottom = visibleTop + document.body.offsetHeight/*-(document.body.offsetHeight/2)*/;
	return ((posBottom >= visibleTop) && (posTop <= visibleBottom));
}

function getAnimationState (el) {
	return el.style.webkitAnimationPlayState || el.style.mozAnimationPlayState || el.style.msAnimationPlayState || el.style.oAnimationPlayState || el.style.animationPlayState;
}

function setAnimationState (el, state) {
	el.style.webkitAnimationPlayState=state;
	el.style.mozAnimationPlayState   =state;
	el.style.msAnimationPlayState    =state;
	el.style.oAnimationPlayState     =state;
	el.style.animationPlayState      =state;
}

function toggleAnimation (el) {
	if (getAnimationState(el)=='paused')
		setAnimationState (el, 'running');
	else
		setAnimationState (el, 'paused');
}

function setAnimation (el, param) {
	el.style.webkitAnimation=param;
	el.style.mozAnimation   =param;
	el.style.msAnimation    =param;
	el.style.oAnimation     =param;
	el.style.animation      =param;
}

// Prevents event bubble up or any usage after this is called.
eventCancel = function (e) {
	if (!e)
		if (window.event) e = window.event;
		else return;
	if (e.cancelBubble != null) e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	if (e.preventDefault) e.preventDefault();
	if (window.event) e.returnValue = false;
	if (e.cancel != null) e.cancel = true;
}


function addParam(url, param, value) {
	var a = document.createElement('a'), regex = /[?&]([^=]+)=([^&]*)/g;
	var match,
	str = [];
	a.href = url;
	value=value||"";
	while (match = regex.exec(a.search))
		if (encodeURIComponent(param) != match[1])
				str.push(match[1] + "=" + match[2]);
	if(value!='')
				str.push(encodeURIComponent(param) + "=" + encodeURIComponent(value));
			else
				str.push(encodeURIComponent(param));
	a.search = (a.search.substring(0,1) == "?" ? "" : "?") + str.join("&");
	return a.href;
}

function utf8_encode(s) {
  return unescape(encodeURIComponent(s));
}

function utf8_decode(s) {
  return decodeURIComponent(escape(s));
}

function form2args (elements) {
	var args = '';
	for(var i=0, l=elements.length; i<l; i++) {
		var el=elements[i];
		if (el.tagName.toLowerCase() == 'select')
			args+= '&'+el.name+'=' + el.options[el.selectedIndex].value;
		else if (el.tagName.toLowerCase()=='input' && el.type=='checkbox')
			args+= '&'+el.name+'=' + ((el.checked)?el.value:false);
		else if(el.tagName.toLowerCase()=='textarea' || (el.tagName.toLowerCase()=='input' && el.type!='file' && el.type!='submit' && el.type!='button'))
			args+= '&'+el.name+'=' + el.value;
	}
	return '?'+args.substring(1);
}

function getUrlId() {
	var url = window.location.pathname;
	return url.substring(url.lastIndexOf('/')+1);
}
function goTo (url, hash) {
	if(hash && !url)
		window.location.hash=hash;
	else
		window.location.href=url+((hash)?'#'+hash:'');
}