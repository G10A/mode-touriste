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
        	if($_POST['email'] == $_POST['email2']){
                
                // Si c'est bon on regarde dans la base de donnée si le nom de compte est déjà utilisé :
                $reponse = $bdd -> query('SELECT pseudo FROM test WHERE pseudo = $_POST["Nom de compte"]');
            
               if($reponse == NULL){

               		//Même chose pour l'email
               		$reponse = $bdd -> query('SELECT email FROM test WHERE email = $_POST["email"]');
               		if($reponse == NULL){
               
                  
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
      
     
        
    

?>


<?php // On affiche les erreurs :
   if($error == TRUE){ echo $errorMSG; }
?>
<?php // Si l'inscription s'est bien déroulée on affiche le succès :
   if($registerOK == TRUE){ echo $registerMSG; }
?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header.php"); ?>
			<?php include("Base/menu.php"); ?>



			<div id="contenuprincipal">
			



			</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
