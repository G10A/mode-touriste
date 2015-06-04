<?php
    session_start();
?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>

	<?php include("Base/head.php"); ?>
	<body>

		
			<?php include("Base/choixheader.php"); ?>

        <div id="site">


			<div id="deposeruneoffre">
			
			

            <?php
                if(isset($_SESSION['pseudo'])){
            ?>

            

            <fieldset id="formulaire_offre">

                <h1>Déposer une offre</h1>
            <form enctype="multipart/form-data" action="traiter.php" method="post">
                <div id="fruitoulégume">
                    <p><b>fruit ou légume :</b></p>
                    <input type="radio" name="fruit_ou_legume" value="legume" /> Légume<br />
                    <input type="radio" name="fruit_ou_legume" value="fruit" /> Fruit
                </div>
            
                <div id="venteouéchange">
                    <p><b>vente ou échange :</b></p>
                     <input type="radio" name="vente_ou_echange" value="vente" /> vente<br />
                     <input type="radio" name="vente_ou_echange" value="echange" /> échange
                </div>

                <form enctype="multipart/form-data" action="traiter.php" method="post">
                <table>
                    <tr>         
                        <td><label for="Espece"><strong>Espèce :</strong></label></td>
                        <td><input type="text" name="espece" id="Espece"/></td>
                    </tr>

                    <tr>
                        <td><label for="zonedevente"><strong>zone de vente :</strong></label></td>
                        <td><input type="text" name="zone_de_vente" id="zone de vente"/></td>
                    </tr>

                    <tr>
                        <td><label for="dateduproduit"><strong>Date du produit (aaaa-jj-mm) :</strong></label></td>
                        <td><input type="date" name="date_du_produit" id="dateduproduit"/></td> 
                    </tr>
    			
    			    <tr>   
                        <td><label for="poids"><strong>poids (kg) :</strong></label></td>
                        <td><input type="text" name="poids" id="poids"/></td>
                    </tr>
                
                	<tr>   
                        <td><label for="prix"><strong>prix (euros) :</strong></label></td>
                        <td><input type="text" name="prix" id="prix"/></td>
                    </tr>

                    <tr>
                        <td><label for="provenance"><strong>provenance :</strong></label></td>
                        <td><input type="text" name="provenance" id="provenance"/></td> 
                    </tr>
                
                    <tr>
                        <td><label for="quantite"><strong>quantité :</strong></label></td>
                        <td><input type="text" name="quantite" id="quantite"/></td> 
                    </tr>

                    <tr>
                        <td><label for="commentaire"><strong>commentaire</strong></label></td>
                        <td><textarea name="commentaire" id="commentaire"></textarea></td>
        	        </tr>
               
                
                    <tr>
                        <td><input class="input_photo" type="file" name="photo" /></td>
                    </tr>

                    <tr>
                        <td><input type="submit" name="register_offer" value="Déposer l'offre"/></td>
                    </tr>    
                </table>
            
                
        
            </form>
            </fieldset>

            <div class="div_photo"></div>

            

            <?php
                }
                else{
                    echo "Veuillez vous connecter pour accéder à cette fonctionnalité";
                }
            ?>

					
            
            </div>
        </div>
			<?php include("Base/footer.php"); ?>
        
        <script src="javascript/preview_photo.js"></script>


	</body>
</html>
