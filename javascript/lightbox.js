(function(){

	var se_connecter = document.getElementById('se_connecter');
	var annuler = document.getElementById('annuler');
	var filtre = document.getElementById('filtre');
	var boite = document.getElementById('boite');
	
	var par = document.getElementById('message_erreur2');


	

	//ouvre la lightbox pour se connecter
	se_connecter.addEventListener('click', function(){

		
		filtre.style.display = 'block';
		boite.style.display = 'block';

	}, false);

	
	//ferme la lightbox 
	annuler.addEventListener('click', function(){

				
		filtre.style.display = 'none';
		boite.style.display = 'none';

	}, false);



/*

	//affiche le message
	function envoiOk(mess){

		if(mess){	

			var par = document.getElementById('message_erreur2');
			var message2 = document.createTextNode(mess);
			par.appendChild(message2);
			return false;
		}
		return true;				
	}


	

	var formulaire = document.getElementById('formulaire_inscription');

	//valide la connection ou appelle la fonction qui affiche le message sinon
	formulaire.addEventListener('submit', function(){


		var message = document.getElementById('message_erreur').value;

		envoiOk(message);

	}, false);


*/

})();	


