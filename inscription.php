<?php
	session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=test','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// On met les variables utilisé dans le code PHP à FALSE (C'est-à-dire les désactiver pour le moment).
$error = FALSE;
$registerOK = FALSE;

    // On regarde si l'utilisateur est bien passé par le module d'inscription
    if(isset($_POST['register'])){
        
        // On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
        if($_POST['Nom'] == NULL OR $_POST['Prenom'] == NULL OR $_POST['Année de naissance'] == NULL OR $_POST['sexe'] == NULL OR $_POST['Localité'] == NULL OR $_POST['Nom de compte'] == NULL OR $_POST['pass'] == NULL OR $_POST['pass2'] == NULL OR $_POST['email'] == NULL OR $_POST['email2'] == NULL){
            
            // On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
            $error = TRUE;
            
            // On écrit le message à afficher :
            $errorMSG = 'Tout les champs doivent être remplis !';
                
        }
        
        // Sinon, si les deux mots de passes correspondent :
        elseif($_POST['pass'] == $_POST['pass2']){

        	//Et si les deux adresses email correspondent
        	if($_POST['email'] == $_PSOT['email2']){
                
                // Si c'est bon on regarde dans la base de donnée si le nom de compte est déjà utilisé :
                $reponse = $bdd -> query('SELECT pseudo FROM test WHERE pseudo == '$_POST['Nom de compte']'');
                
            	// On compte combien de valeur a pour nom de compte celui tapé par l'utilisateur.
            	$reponse = mysql_num_rows($reponse);
            
               // Si $sql est égal à 0 (c'est-à-dire qu'il n'y a pas de nom de compte avec la valeur tapé par l'utilisateur
               if($reponse == 0){

               		//Même chose pour l'email
               		$reponse = $bdd -> query('SELECT email FROM test WHERE email =='$_POST['email']'');
               		$reponse = mysql_num_rows($reponse);
               		if($reponse == 0){
               
                  
						// Si tout ce passe correctement, on peut maintenant l'inscrire dans la base de données :
                        $requete = $bdd->prepare('INSERT INTO test(nom, prenom, année de naissance, sexe, localité, pseudo, mot de passe, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                        $requete = execute(array($_POST['Nom'], $_POST['Prenom'], $_POST['Année de naissance'], $_POST['sexe'], $_POST['sexe'], $_POST['Localité'], $_POST['Nom de compte'], $_POST['pass'], $_POST['email']));
                           
                           
                           // Si la requête s'est bien effectué :
                           if($requete){
                           
                              // On met la variable $registerOK à TRUE pour que l'inscription soit finalisé
                              $registerOK = TRUE;
                              // On l'affiche un message pour le dire que l'inscription c'est bien déroulé :
                              $registerMSG = 'Votre inscription est terminée vous pouvez dès maintenant vous connecter au site.';
    
                           }
                           
                           // Sinon on l'affiche un message d'erreur (généralement pour vous quand vous testez vos scripts PHP)
                           else{
                           
                              $error = TRUE;
                              
                              $errorMSG = 'Erreur dans la requête SQL<br/>'.$requete.'<br/>';
                           
                           }
                                                
                 		}
                  
                	}

            	}
               
               // Sinon on affiche un message d'erreur lui disant que ce nom de compte est déjà utilisé.
               else{
               
                  $error = TRUE;
                  
                  $errorMSG = 'Le nom de compte <strong>'.$_POST['login'].'</strong> est déjà utilisé !';
                  
                  $login = NULL;
                  
                  $pass = $_POST['pass'];
               
               }
            }
            
            // Sinon les deux emails sont différents
            elseif($_POST['email'] != $_POST['email2']){
                
                $error = TRUE;
                
                $errorMSG = 'Les deux adresses emails sont différentes';
                
            }
            
        }
      
      // Sinon si les deux mots de passes sont différents :      
      elseif($_POST['pass'] != $_POST['pass2']){
      
         $error = TRUE;
         
         $errorMSG = 'Les deux mots de passes sont différents !';
         
         $login = $_POST['login'];
         
         $pass = NULL;
      
      }
      
     
        
    }

?>


<?php // On affiche les erreurs :
   if($error == TRUE){ echo "<p align="center" style="color:red;">".$errorMSG."</p>"; }
?>
<?php // Si l'inscription s'est bien déroulée on affiche le succès :
   if($registerOK == TRUE){ echo "<p align="center" style="color:green;"><strong>".$registerMSG."</strong></p>"; }
?>
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
            <td><input type="date" name="Année de naissance" id="Année de naissance"/></td> 
            </tr>
            
            
			<input type="radio" name="sexe" value="homme" /> Homme<br />
			<input type="radio" name="sexe" value="femme" /> Femme
		

			 <tr>   
            <td><label for="Localité"><strong>Localité :</strong></label></td>
            <td><input type="Localité" name="Localité" id="Localité"/></td>
               </tr>
            
            			 <tr>   
            <td><label for="Nom de compte"><strong>Nom de compte :</strong></label></td>
            <td><input type="Nom de compte" name="Nom de compte" id="Nom de compte"/></td>
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
