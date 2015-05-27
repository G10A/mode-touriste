(function(){

	//fonction qui permet de charger la photo
	function createThumbnail(file){

		//On instancie l'objet permettant la lecture du fichier
		var reader = new FileReader();

		//On lit l'URL de la photo qu'on récupérera avec la propriété result
		reader.readAsDataURL(file);

		//On charge la photo, dont l'URL est récupéré via la propriété result 
		reader.addEventListener('load',function(e){

			var imgElement = document.createElement('img');
			imgElement.style.maxWidth = '400x';
			imgElement.style.maxHeight = '400px';
			imgElement.src = e.target.result;
			div_photo.appendChild(imgElement);

		}, false);

			
	}


	var allowed_types = ['png', 'jpg', 'jpeg', 'gif'];      //On définit les extensions qui vont être autorisées
	var fileInput = document.getElementById('input_photo'); //on accède a l'élément input contenant la photo
	var div_photo = document.getElementById('div_photo');   // on accède au div où l'on va placer la photo


	fileInput.addEventListener('change', function(e){

		//On accède au fichier
		var files = e.target.files;
		var imgType;

		//on sépare le nom de son extension et on les place dans un tableau
		imgType = files[0].name.split('.');
		//On récupère l'extension que l'on met en minuscule
		imgType = imgType[imgType.length - 1].toLowerCase();

		//On vérifie que l'extension est autorisée avant de charger la photo
		if(allowed_types.indexOf(imgType) != -1){
			createThumbnail(files[0]);
		}
		
	}, false);


})();
	

