<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<?php include("supprimer.php")  ?>
	<body>
		<div id="site">
		
			
		<?php 
		
				$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
			$reponse = $bdd->prepare('SELECT * FROM offre WHERE ID=?');
			$reponse -> execute(array($_GET['$offre']));
			$donnees = $reponse->fetch();
			if(isset($_SESSION['pseudo'])){

				 include("Base/choixheader.php");


				 if($_SESSION['pseudo']==$donnees['pseudo']){
				 	?>C'est votre annonce ! Retourner sur la page des offres pour d'autre annonce.<?php 
				 }else{?>
				 	<div id="site">
				 	<h2>Vous pouver contacter vous même le vendeur avec son adresse mail : 
				 	<?php 			$reponse2 = $bdd->prepare('SELECT * FROM inscrits WHERE pseudo=?');
									$reponse2 -> execute(array($donnees['pseudo']));
									$donnees2 = $reponse2->fetch();
									echo $donnees2["email"];?></h2></br>


									<h2>Une fois que vous vous êtes arrangé, pour garder des traces ou même un mémo, remplisser cette fiche</h2>

								            <fieldset id="formulaire">

                <h1>Envoyer demande</h1>

                <form enctype="multipart/form-data" action="traiter4.php" method="post">
                <table>
                    <tr>         
                        <td><label for="Espece"><strong>Lieu :</strong></label></td>
                        <td><input type="text" name="Lieu" id="Lieu"/></td>
                    </tr>


    			
    			    <tr>   
                        <td><label for="poids"><strong>poids (kg) :</strong></label></td>
                        <td><input type="text" name="poids" id="poids"/></td>
                    </tr>
                
                	<tr>   
                        <td><label for="prix"><strong>prix convenue :</strong></label></td>
                        <td><input type="text" name="prix" id="prix"/></td>
                    </tr>

                
                    <tr>
                        <td><label for="quantite"><strong>quantité :</strong></label></td>
                        <td><input type="text" name="quantite" id="quantite"/></td> 
                    </tr>

                    <tr>
                        <td><label for="commentaire"><strong>commentaire</strong></label></td>
                        <td><textarea name="commentaire" id="commentaire"></textarea></td>
        	        </tr>
               		<input type="hidden" name="idoffre" value="<?php echo $_GET['$offre'] ?>"/></input>
               		<input type="hidden" name="pseudovendeur" value="<?php echo $donnees['pseudo'] ?>"/ ></input>

                

                    <tr>
                        <td><input type="submit" name="Demande" value="Envoyer demande"/></td>
                    </tr>    
                </table>
            		</form>
                

            </fieldset>




				 <?php
				 	}
			}
			else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}
			?>

				 			<?php  include("Base/footer.php");  ?>

		</div>

	
		
	</body>
</html>
