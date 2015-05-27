<?php
    session_start();
?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>

	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?>


            <?php   
            
            
                $bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
                $reponse = $bdd->prepare('SELECT * FROM offre WHERE pseudo= ? AND id=?');
                $reponse -> execute(array($_SESSION['pseudo'],$_GET['$offre']));
                $donnees = $reponse->fetch();
                ?>

			<div id="deposeruneoffre">
			
			<h1>Modifier l'offre <?php echo $donnees['espece'];?> </h1>

            <?php
                if(isset($_SESSION['pseudo'])){
            ?>

            <fieldset id="formulaire">
            <form action="traiter2.php" method="post">
        
                <table>
                    <tr>         
                        <td><label for="poids"><strong>Espèce : avant c'était :<?php echo $donnees['espece'];?></strong></label></td>
                        <td><input type="text" name="espece" id="Espece"/></td>
                        
                    </tr>

                    <tr>
                        <td><label for="poids"><strong>Zone de vente : avant c'était :<?php echo $donnees['zone_de_vente'];?></strong></label></td>
                        <td><input type="text" name="zone_de_vente" id="zone de vente"/>
                            
                    </tr>

                    <tr>
                       <td><label for="poids"><strong>Date du produit : avant c'était :<?php echo $donnees['date_du_produit'];?></strong></label></td>
                        <td><input type="date" name="date_du_produit" id="dateduproduit"/></td> 
                    </tr>
                
                    <div id="fruitoulégume">
                        <p><b>Fruit ou légume :avant c'était :<?php echo $donnees['fruit_ou_legume'] ?></b></p>
    		            <input type="radio" name="fruit_ou_legume" value="legume" /> Légume<br />
    			        <input type="radio" name="fruit_ou_legume" value="fruit" /> Fruit
    		        </div>
    	
    		
    			    <div id="venteouéchange">
    				    <p><b>vente ou échange : avant c'était : <?php echo $donnees['vente_ou_echange'] ?></b></p>
    			         <input type="radio" name="vente_ou_echange" value="vente" /> vente<br />
    			         <input type="radio" name="vente_ou_echange" value="echange" /> échange
    		        </div>
    			
    			    <tr>   
                        <td><label for="poids"><strong>poids (kg) : avant c'était : <?php echo $donnees['poids'] ?></strong></label></td>
                        <td><input type="text" name="poids" id="poids"/></td>
                    </tr>
                
                	<tr>   
                        <td><label for="prix"><strong>prix (euros) : avant c'était :<?php echo $donnees['prix'] ?></strong></label></td>
                        <td><input type="text" name="prix" id="prix"/></td>
                    </tr>

                    <tr>
                        <td><label for="provenance"><strong>provenance : avant c'etait : <?php echo $donnees['provenance'] ?></strong></label></td>
                        <td><input type="text" name="provenance" id="provenance"/></td> 
                    </tr>
                
                    <tr>
                        <td><label for="quantité"><strong>quantité : avant c'était : <?php echo $donnees['quantite'] ?></strong></label></td>
                        <td><input type="text" name="quantite" id="quantite"/></td> 
                    </tr>

                    <tr>
                        <td><label for="commentaire">commentaire : avant c'était : <?php echo $donnees['commentaire'] ?></label></td>
                        <td><textarea name="commentaire" id="commentaire"></textarea></td>
        	        </tr>
               
                
                    <tr>
                        <td><input type="file" name="photo" /></td>
                    </tr>
                
                </table>
            
                <input type="submit" name="modifie_offer" value="Modifier l'offre"/>
        
            </form>
            </fieldset>

            <?php
                }
                else{
                    echo "Veuillez vous connecter pour accéder à cette fonctionnalité";
                }
            ?>

					



			</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
