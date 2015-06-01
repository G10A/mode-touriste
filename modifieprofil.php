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
 
                $reponse = $bdd->prepare('SELECT * FROM inscrits WHERE id= ? ');
                $reponse -> execute(array($_GET['$offre']));
                $donnees = $reponse->fetch();

                ?>
                 


            <div id="contenuprincipal">
            <fieldset id="formulaire">
                    <h1>Modifier son profil</h1>

        <form action="traiter3.php" method="post">
        
            <table>
            	<tr>
            
            <td><label for="Nom"><strong>Nom :</strong></label></td>
            <td><input type="text" name="Nom" id="Nom"  value="<?php echo $donnees['nom'] ?>"/></td>
            
            </tr>

            	<tr>
                 <td><label for="Prenom"><strong>Prenom :</strong></label></td>
            <td><input type="text" name="Prenom" id="Prenom" value="<?php echo $donnees['prenom'] ?>"/></td>
            
            </tr>

                       <tr>
                 <td><label for="Année naissance"><strong>Date de naissance (aaaa-jj-mm) :</strong></label></td>
            <td><input type="date" name="Annee_de_naissance" id="Année de naissance" value="<?php echo $donnees['annee_de_naissance'] ?>"/></td> 
            </tr>
            
            
			<input type="radio" name="sexe" value="homme" /> Homme<br />
			<input type="radio" name="sexe" value="femme" /> Femme
		

			 <tr>   
            <td><label for="Localité"><strong>Localité :</strong></label></td>
            <td><input type="Localité" name="Localite" id="Localité" value="<?php echo $donnees['localite'] ?>"/></td>
               </tr>
            
            			 <tr>   
            <td><label for="Nom de compte"><strong>Nom de compte :</strong></label></td>
            <td><input type="Nom de compte" name="login" id="Nom de compte" value="<?php echo $donnees['pseudo'] ?>"/></td>
               </tr>

            <tr>
            <td><label for="pass"><strong>Mot de passe :</strong></label></td>
            <td><input type="password" name="pass" id="pass"/ value="<?php echo $donnees['mot_de_passe'] ?>"></td>
            
            </tr>
                        <form action="traiter2.php" method="post">
            <input type="hidden" name="idoffre" value="<?php echo $_GET['$offre'] ?>"/></input>
            


            <tr>            
            <td><label for="pass2"><strong>Confirmez le mot de passe :</strong></label></td>
            <td><input type="password" name="pass2" id="pass2" value="<?php echo $donnees['mot_de_passe'] ?>"/></td>
            </tr>
            
            <tr>
            <td><label for="email"><strong>Adresse e-mail :</strong></label></td>
            <td><input type="email" name="email" id="email" value="<?php echo $donnees['email'] ?>"/></td>
            </tr>
            
            <tr>
            <td><label for="email2"><strong>Confirmez l adresse  e-mail :</strong></label></td>
            <td><input type="email2" name="email2" id="email2" value="<?php echo $donnees['email'] ?>"/></td>
            </tr>

            
            </table>
        
        <input type="submit" name="modifier_profil" value="Modifier son profil"/>
        
        </form>
            			</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
