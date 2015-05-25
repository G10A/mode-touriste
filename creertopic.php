<?php
	session_start();
?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>

<html>

	<body>
			<?php include("Base/head.php"); ?>
			<?php 
			if(isset($_SESSION['pseudo'])){?>

				<div id="site">
				<?php include("Base/choixheader.php"); ?>
				</div> 
				<div id="contenuprincipalf">
				<h1>Création topic</h1>
			
				<tr>          
            	<td><label for="Nom"><strong>Nom :</strong></label></td>
            	<td><input type="text" name="nom" id="Nom"/></td>      
            	</tr> <br><br>

            	<tr>
     		 	<td><label for="Contenu"> <strong> Contenu : </strong></label></td>
      			 <td><textarea name="contenu" id="contenu" rows="10" cols="50"></textarea></td>
    	   		</tr>

    	   		<tr>
				<p style= "font:  17pt serif">
				<input type="submit" name="Etopic"  value=" Enregistrer le topic"/>
				</tr>
				</div>
				</div>
				<?php } 


		
				 else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
				}?>
			

	</body>

</html>