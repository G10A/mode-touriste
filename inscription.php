<?php
    session_start();
// <<<<<<< HEAD

    $bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // On met les variables utilisé dans le code PHP à FALSE (C'est-à-dire les désactiver pour le moment).
$error = FALSE;
$registerOK = FALSE;

// On regarde si l'utilisateur est bien passé par le module d'inscription
if(isset($_POST['register'])){
        
  // On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
  if(isset($_POST['Nom']) AND isset($_POST['Prenom']) AND isset($_POST['Annee_de_naissance']) AND isset($_POST['sexe']) AND isset($_POST['Localite']) AND isset($_POST['login']) AND isset($_POST['pass']) AND isset($_POST['pass2']) AND isset($_POST['email']) AND isset($_POST['email2'])){            
        
    //On regarde si les chaines de caractères n'excèdent pas la limite de la base de donnée.
    if(strlen($_POST['Nom']) < 50 AND strlen($_POST['Prenom']) < 50 AND strlen($_POST['sexe']) < 50 AND strlen($_POST['Localite']) < 50 AND strlen($_POST['login']) < 50 AND strlen($_POST['pass']) < 50 AND strlen($_POST['email']) < 50 ){

    // Sinon, si les deux mots de passes correspondent :
    if($_POST['pass'] == $_POST['pass2']){

      //Et si les deux adresses email correspondent
      if($_POST['email'] == $_POST['email2']){
                
        // Si c'est bon on regarde dans la base de donnée si le nom de compte est déjà utilisé :
        $reponse = $bdd -> query("SELECT COUNT(pseudo) FROM inscrits WHERE pseudo = '".$_POST['login']."'");
        
        if($reponse -> fetch()[0] == 0){

          //Même chose pour l'email
          $reponse2 = $bdd -> query("SELECT COUNT(email) FROM inscrits WHERE email = '".$_POST['email']."'");

          if($reponse2 -> fetch()[0] == 0){
                                 
                      // Si tout ce passe correctement, on peut maintenant l'inscrire dans la base de données :
            $requete = $bdd -> prepare('INSERT INTO inscrits(nom, prenom, annee_de_naissance, sexe, localite, pseudo, mot_de_passe, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $insertion = $requete -> execute(array($_POST['Nom'], $_POST['Prenom'], $_POST['Annee_de_naissance'], $_POST['sexe'], $_POST['Localite'], $_POST['login'], $_POST['pass'], $_POST['email']));
                           
                           
            // Si la requête s'est bien effectué :
            if($insertion){
                           
              // On met la variable $registerOK à TRUE pour que l'inscription soit finalisé
              $registerOK = TRUE;
                
              // On l'affiche un message pour le dire que l'inscription c'est bien déroulé :
              $registerMSG = "Votre inscription est terminée vous pouvez dès maintenant vous connecter au site.";
    
            }
                           
            // Sinon on l'affiche un message d'erreur (généralement pour vous quand vous testez vos scripts PHP)
            else{
                           
              $error = TRUE;
                              
              $errorMSG = 'Erreur dans la requête SQL<br/>'.$requete.'<br/>';
                         
            }
                                                
          }

          //Sinon on affice un message d'erreur lui disant que cet email est déjà utilisé.
          else{

            $error = TRUE;

            $errorMSG = 'L\'email <strong>'.$_POST['email'].'<strong/> est déjà utilisée !';

            $login = $_POST['login'];

            $pass = $_POST['pass'];

            $email = NULL;
          }
                  
        }
               
        // Sinon on affiche un message d'erreur lui disant que ce nom de compte est déjà utilisé.
        else{
               
          $error = TRUE;
                  
          $errorMSG = 'Le nom de compte <strong>'.$_POST['login'].'</strong> est déjà utilisé !';
                  
          $login = NULL;
                  
          $pass = $_POST['pass'];

          $email = $_POST['email'];
               
        }
      }
            
      // Sinon les deux emails sont différents
      elseif(isset($_POST['email'])){

        if($_POST['email'] != $_POST['email2']){

          $error = TRUE;
                
          $errorMSG = 'Les deux adresses emails sont différentes';

        }
                
      }
            
    }
      
    // Sinon si les deux mots de passes sont différents : 
    elseif (isset($_POST['pass'])){
    // Instructions si $_POST['truc'] existe

      if($_POST['pass'] != $_POST['pass2']){
      
        $error = TRUE;
         
        $errorMSG = 'Les deux mots de passes sont différents !';
         
        $login = $_POST['login'];
         
        $pass = NULL;

        $email = $_POST['email'];
      
      }

    }

    }

    //Sinon on affiche un message d'erreur
    else{

      $error = TRUE;

      $errorMSG = 'Veuillez remplir les champs avec moins de 50 caractères (espaces compris) !';

    }
  }
  
  //Sinon si tout les champs ne sont pas remplis :
  else{
    // On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
    $error = TRUE;
            
    // On écrit le message à afficher :
    $errorMSG = 'Tous les champs doivent être remplis !';
      
  }
}
//=======
//>>>>>>> origin/master
?>

<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
		<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?>

			<div id="contenuprincipal">

                <?php

                if($error OR (!$error AND !$registerOK)){ 
                
                ?>
				 
        <fieldset id="formulaire_inscription">
          <h1>Inscription</h1>

          <form action="inscription.php" method="post">
        
            <table>
            <tr>
                <td><label for="sexe"><strong>Sexe : </strong></label>
              <input type="radio" name="sexe" value="homme" /> Homme
              <input type="radio" name="sexe" value="femme" /> Femme
                </td> 
            </tr>

            <tr>
            </tr> 

            <tr>      
            <td><label for="Nom"><strong>Nom :</strong></label></td>
            <td><input type="text" name="Nom" id="Nom"/></td>         
            </tr>


                 <td><label for="Prenom"><strong>Prenom :</strong></label></td>
              <td><input type="text" name="Prenom" id="Prenom"/></td>
            
            </tr>

            </tr>
              <td><label for="Année naissance"><strong>Date de naissance (aaaa-jj-mm) :</strong></label></td>
              <td><input type="date" name="Annee_de_naissance" id="Année de naissance"/></td>
            </tr>
		

			    <tr>   
            <td><label for="Localité"><strong>Localité :</strong></label></td>
            <td><input type="Localité" name="Localite" id="Localité"/></td>
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
            <td><label for="email2"><strong>Confirmez l adresse  e-mail :</strong></label></td>
            <td><input type="email2" name="email2" id="email2"/></td>
            </tr>

            
            </table>
        
        <input type="submit" name="register" value="S'inscrire"/>
        
        </form>
      </fieldset>
    
    <?php

        if($error){
                
            echo $errorMSG;
            
        }
            
    }

    elseif($registerOK){
    
        echo $registerMSG;
    
    } 
    ?>
        
    	</div>
        <?php include("Base/footer.php"); ?>
    </body>

</html>
