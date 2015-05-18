<!DOCTYPE html>

<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header.php"); ?>
			<?php include("Base/menu.php"); ?>
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

					<?php include("Base/footer.php"); ?>
		

	</body>
</html>