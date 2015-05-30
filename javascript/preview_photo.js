(function(){

	//fonction qui permet de charger la photo
	function createThumbnail(file){

		//On instancie l'objet permettant la lecture du fichier
		var reader = new FileReader();

		//On lit l'URL de la photo qu'on récupérera avec la propriété result
		reader.readAsDataURL(file);

		//On charge la photo, dont l'URL est récupéré via la propriété result 
		reader.addEventListener('load',function(e){
			
			imgElement.src = e.target.result;
						
		}, false);

			
	}


	var allowed_types = ['png', 'jpg', 'jpeg', 'gif'];      //On définit les extensions qui vont être autorisées
	var fileInput = document.querySelector('.input_photo'); //on accède a l'élément input contenant la photo
	var div_photo = document.querySelector('.div_photo');   // on accède au div où l'on va placer la photo

	//On crée l'image et on l'insère seulement si elle n'existe pas encore
	if(!imgElement){
			var imgElement = document.createElement('img');
			imgElement.style.minWidth = '100px';
			imgElement.style.minHeight = '100px';
			imgElement.style.maxWidth = '100px';
			imgElement.style.maxHeight = '100px';
			div_photo.appendChild(imgElement);
	}


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
	

