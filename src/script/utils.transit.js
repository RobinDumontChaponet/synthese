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