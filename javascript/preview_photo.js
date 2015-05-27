(function(){

	//fonction qui permet de load le fichier
	function createThumbnail(file){

		var reader = new FileReader();

		reader.addEventListener('load',function(e){

			var imgElement = document.createElement('img');
			imgElement.style.maxWidth = '450px';
			imgElement.style.maxHeight = '450px';
			imgElement.src = e.target.result;
			div_photo.appendChild(imgElement);

		}, false);

		reader.readAsDataURL(file);	
	}


	var allowed_types = ['png', 'jpg', 'jpeg', 'gif'];
	var fileInput = document.getElementById('input_photo'); //on accède a l'élément input contenant la photo
	var div_photo = document.getElementById('div_photo');   // on accède au div où l'on va placer la photo


	fileInput.addEventListener('change', function(e){

		var files = e.target.files;
		var imgType;

		//on sépare le nom de son extension et on les palce dans un tableau
		imgType = files[0].name.split('.');
		//On récupère l'extension que l'on met en minuscule
		imgType = imgType[imgType.length - 1].toLowerCase();

		//On vérifie que l'extension est autorisée avant de charger la photo
		if(allowed_types.indexOf(imgType) != -1){
			createThumbnail(files[0]);
		}
		
	}, false);


})();
	

