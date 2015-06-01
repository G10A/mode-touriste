<?php 
	
?>

<?php
	if(isset($_POST['supprimer_offre'])){
		if(isset($_SESSION['pseudo'])){
?>	
				
			

					<?php
						
						$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

						$supprimer = $bdd->exec("DELETE FROM offre WHERE pseudo='".$_SESSION['pseudo']."' AND id='".$_POST['id_offre']."'");
		            ?>   

                	
<?php
        }
	}
?>


			 