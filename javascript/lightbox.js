(function(){

	var se_connecter = document.getElementById('se_connecter');
	var annuler = document.getElementById('annuler');
	var filtre = document.getElementById('filtre');
	var boite = document.getElementById('boite');
	

	
	
	se_connecter.addEventListener('click', function(){

		
		filtre.style.display = 'block';
		boite.style.display = 'block';

	}, false);

	

	annuler.addEventListener('click', function(){

				
		filtre.style.display = 'none';
		boite.style.display = 'none';

	}, false);

})();	


