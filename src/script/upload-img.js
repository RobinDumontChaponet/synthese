FileTransfert = function (input, destination, callback) {
	var t=this;
	t.input=input;
	t.callback=callback;

	t.input.onchange=function(){
		if(this.parentNode.getElementsByTagName('img')[1]) this.parentNode.getElementsByTagName('img')[1].style.visibility='hidden';
		this.parentNode.className='button loading';

		var fd = new FormData();
		fd.append('upload', this.files[0]);
		fd.append('destination', destination);

		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'helpers/upload-img.php', true);

		xhr.onload = function() {
			if(this.readyState  == 4)
				if (this.status == 200) {
					//console.log('responseText: '+this.responseText);

					if(this.responseText=='unaccepted extension')
						new Note('Type de fichier non-autorisé.', 3000, 'error');
					else {
						var resp = JSON.parse(this.response);

						t.callback(resp);
					}

					t.input.parentNode.className='button';
				}
		};
		xhr.send(fd);
	}
};