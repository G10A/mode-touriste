<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
		<body>

		<div id="site">
			<?php include("BaseGB/headerGB.php"); ?>
		<?php include("BaseGB/menuGB.php"); ?>

			<div id="contenuprincipal">
				<h1>Register</h1>


 <form action="index.php" method="post">
        
            <table>
            	            <tr>
            
            <td><label for="Nom"><strong>Last name :</strong></label></td>
            <td><input type="text" name="Nom" id="Nom"/></td>
            
            </tr>


                 <td><label for="Prenom"><strong>First name :</strong></label></td>
            <td><input type="text" name="Prenom" id="Prenom"/></td>
            
            </tr>

                       </tr>
                 <td><label for="Année naissance"><strong>Birth date (dd/mm/yy) :</strong></label></td>
            <td><input type="text" name="Année de naissance" id="Année de naissance"/></td> 
            </tr>
            
            
			<input type="radio" name="sexe" value="homme" /> Man<br/>
			<input type="radio" name="sexe" value="femme" /> Woman
		

			 <tr>   
            <td><label for="Localité"><strong>City :</strong></label></td>
            <td><input type="Localité" name="Localité" id="Localité"/></td>
               </tr>
            
            			 <tr>   
            <td><label for="Nom de compte"><strong>Nickname :</strong></label></td>
            <td><input type="Nom de compte" name="login" id="Nom de compte"/></td>
               </tr>

            <tr>
            <td><label for="pass"><strong>Password :</strong></label></td>
            <td><input type="password" name="pass" id="pass"/></td>
            
            </tr>
            


            <tr>            
            <td><label for="pass2"><strong>Confirm password :</strong></label></td>
            <td><input type="password" name="pass2" id="pass2"/></td>
            </tr>
            
            <tr>
            <td><label for="email"><strong>E-mail :</strong></label></td>
            <td><input type="email" name="email" id="email"/></td>
            </tr>
            
            <tr>
            <td><label for="email2"><strong>Confirm e-mail :</strong></label></td>
            <td><input type="email2" name="email2" id="email2"/></td>
            </tr>

            
            </table>
        
        <input type="submit" name="register" value="Register"/>
        
        </form>
        
    	</div>
        <?php include("BaseGB/footerGB.php"); ?>
    </body>

</html>
