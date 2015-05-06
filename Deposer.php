<!DOCTYPE html>
<html>

	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header.php"); ?>
			<?php include("Base/menu.php"); ?>



			<div id="deposeruneoffre">
			
			<h1>Déposer une offre</h1>


 <form action="index.php" method="post">
        
            <table>
            	            <tr>
            
            <td><label for="Espèce"><strong>Espèce :</strong></label></td>
            <td><input type="text" name="Espèce" id="Espèce"/></td>
            
            </tr>


                 <td><label for="zonedevente"><strong>zone de vente :</strong></label></td>
            <td><input type="text" name="zone de vente" id="zone de vente"/></td>
            
            </tr>

                       <tr>
                 <td><label for="dateduproduit"><strong>Date du produit :</strong></label></td>
            <td><input type="date" name="dateduproduit" id="dateduproduit"/></td> 
            </tr>
            
            <div id="fruitoulégume">
            <p><b>fruit ou légume :</b></p>
		    <input type="radio" name="fruitoulégume" value="légume" /> Légume<br />
			<input type="radio" name="fruitoulégume" value="fruit" /> Fruit
		</div>
	
		
			<div id="venteouéchange">
				<p><b>vente ou échange :</b></p>
			<input type="radio" name="venteouéchange" value="vente" /> vente<br />
			<input type="radio" name="venteouéchange" value="échange" /> échange
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
       <td><label for="commentaire">commentaire</label></td>
       <td><textarea name="commentaire" id="commentaire"></textarea></td>
    	   </tr>
            
            <tr>
                <td><input type="file" name="photo" /></td>
            </tr>
            
            </table>
        
        <input type="submit" name="register" value="Déposer l'offre"/>
        
        </form>

					



			</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
