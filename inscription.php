<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
		<body>

		<div id="site">
			<?php include("Base/header.php"); ?>
			<?php include("Base/menu.php"); ?>

			<div id="contenuprincipal">
				<h1>Inscription</h1>


 <form action="index.php" method="post">
        
            <table>
            	            <tr>
            
            <td><label for="Nom"><strong>Nom :</strong></label></td>
            <td><input type="text" name="Nom" id="Nom"/></td>
            
            </tr>


                 <td><label for="Prenom"><strong>Prenom :</strong></label></td>
            <td><input type="text" name="Prenom" id="Prenom"/></td>
            
            </tr>

                       </tr>
                 <td><label for="Année naissance"><strong>Date de naissance :</strong></label></td>
            <td><input type="date" name="Année_de_naissance" id="Année de naissance"/></td> 
            </tr>
            
            
			<input type="radio" name="sexe" value="homme" /> Homme<br />
			<input type="radio" name="sexe" value="femme" /> Femme
		

			 <tr>   
            <td><label for="Localité"><strong>Localité :</strong></label></td>
            <td><input type="Localité" name="Localité" id="Localité"/></td>
               </tr>
            
            			 <tr>   
            <td><label for="Nom de compte"><strong>Nom de compte :</strong></label></td>
            <td><input type="Nom de compte" name="login" id="Nom de compte"/></td>
               </tr>

            <tr>
            <td><label for="pass"><strong>Mot de passe :</strong></label></td>
            <td><input type="password" name="pass" id="pass"/></td>
            
            </tr>
            


            <tr>            
            <td><label for="pass2"><strong>Confirmez le mot de passe :</strong></label></td>
            <td><input type="password" name="pass2" id="pass2"/></td>
            </tr>
            
            <tr>
            <td><label for="email"><strong>Adresse e-mail :</strong></label></td>
            <td><input type="email" name="email" id="email"/></td>
            </tr>
            
            <tr>
            <td><label for="email2"><strong>Confirmez l'adresse  e-mail :</strong></label></td>
            <td><input type="email2" name="email2" id="email2"/></td>
            </tr>

            
            </table>
        
        <input type="submit" name="register" value="S'inscrire"/>
        
        </form>
        <?php include("Base/footer.php"); ?>
    	</div>
    </body>

</html>
