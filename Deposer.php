<!DOCTYPE html>
<html>

	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header_non_connecte.php"); ?>
			<?php include("Base/menu.php"); ?>



			<div id="deposeruneoffre">
			
			<h1>Déposer une offre</h1>


 <form action="traiter.php" method="post">
        
            <table>
            	            <tr>
            
            <td><label for="Espece"><strong>Espèce :</strong></label></td>
            <td><input type="text" name="espece" id="Espece"/></td>
            
            </tr>


                 <td><label for="zonedevente"><strong>zone de vente :</strong></label></td>
            <td><input type="text" name="zone_de_vente" id="zone de vente"/></td>
            
            </tr>

                       <tr>
                 <td><label for="dateduproduit"><strong>Date du produit :</strong></label></td>
            <td><input type="date" name="date_du_produit" id="dateduproduit"/></td> 
            </tr>
            
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
            <td><label for="quantité"><strong>quantité :</strong></label></td>
            <td><input type="text" name="quantite" id="quantite"/></td>
            
            </tr>

            <tr>
       <td><label for="commentaire">commentaire</label></td>
       <td><textarea name="commentaire" id="commentaire"></textarea></td>
    	   </tr>
           
            
            <tr>
                <td><input type="file" name="photo" /></td>
            </tr>
            
            </table>
        
        <input type="submit" name="register_offer" value="Déposer l'offre"/>
        
        </form>

					



			</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
