var bouton1 = document.querySelector('#supprimer_offre');

			bouton1.addEventListener('submit', function(e){

					if(confirm("êtes vous sûr de vouloir supprimer cette offre ?")){
						alert('Votre offre a bien été supprimée');
						e.target.submit();	
					}

			}, true);