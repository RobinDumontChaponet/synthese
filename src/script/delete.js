var existingSupprModal;

function supprModal (el) {
	if(existingSupprModal)
		deleteSupprModal(existingSupprModal);
	var container=document.createElement('div'),
	modal=document.createElement('div');
	container.className='modal-container';
	modal.className='modal suppr';
	modal.innerHTML='<a href="'+el.href+'&noconfirm">'+el.innerHTML+'</a><a href="#" onclick="return deleteSupprModal(this);">Annuler</a>';
	container.appendChild(modal);
	el.parentNode.insertBefore(container, el);
	container.insertBefore(el, modal);
	//el.classList.add('opened-modal');
	existingSupprModal=modal;
}

function deleteSupprModal (el) {
	var container = el.parentNode.parentNode,
	parent = container.parentNode;
	parent.insertBefore(container.getElementsByTagName('a')[0], container);
	parent.removeChild(container);
	existingSupprModal=null;

	return false;
}