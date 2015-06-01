<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <?php include("Base/head.php"); ?>
  <body>

    <div id="site">
      <?php include("Base/choixheader.php"); ?>

<?php

  

  $bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->prepare('SELECT * FROM inscrits WHERE  id=?');
                $reponse -> execute(array($_POST['idoffre']));
                $donnees = $reponse->fetch();


  if(isset($_POST['modifier_profil'])){
    
    if(isset($_SESSION['pseudo'])){

    if(isset($_POST['Nom']) AND isset($_POST['Prenom']) AND isset($_POST['Annee_de_naissance']) AND isset($_POST['sexe']) AND isset($_POST['Localite']) AND isset($_POST['login']) AND isset($_POST['pass']) AND isset($_POST['pass2']) AND isset($_POST['email']) AND isset($_POST['email2'])){

      if($_POST['pass'] == $_POST['pass2']){
        if($_POST['email'] == $_POST['email2']){

              $reponse3 = $bdd -> query("SELECT COUNT(pseudo) FROM inscrits WHERE pseudo = '".$_POST['login']."'");


              if(($reponse3 -> fetch()[0] ==0) OR $_POST['login']==$donnees['pseudo']){
         
     
                  $reponse2 = $bdd -> query("SELECT COUNT(email) FROM inscrits WHERE email = '".$_POST['email']."'");
                  if($reponse2 -> fetch()[0]==0 or $_POST['email']==$donnees['email']){
       
      
      
                    $nom = htmlspecialchars($_POST['Nom']);
                    $prenom = htmlspecialchars($_POST['Prenom']);
                    $annee_de_naissance = htmlspecialchars($_POST['Annee_de_naissance']);
                    $sexe = htmlspecialchars($_POST['sexe']);
                    $localite = htmlspecialchars($_POST['Localite']);
                
                    $pseudo = htmlspecialchars($_POST['login']);
                    $pass = htmlspecialchars($_POST['pass']);
                    $email = htmlspecialchars($_POST['email']);

                     $offre = htmlspecialchars($_POST['idoffre']);

      
                     $req=$bdd->exec( "UPDATE inscrits SET nom='".$nom."', prenom= '".$prenom."', annee_de_naissance= '".$annee_de_naissance."', sexe='".$sexe."', localite='".$localite."', pseudo='".$pseudo."', mot_de_passe='".$pass."', email='".$email."' WHERE id='".$offre."'");

                      $message_right = "votre profil a bien été modifié";
                      echo $message_right;
                   }
                  else{
                   $message_right = "l'email est déjà utilisé";
                    echo $message_right;

                  }
              }else{$message_erreur = "Le nom de compte est déjà utilisé";
                echo  $message_erreur;
             }

        }else{$message_erreur = "Les 2 emails sont différents";
        echo  $message_erreur;

        }

      }else{      $message_erreur = "Les 2 mots de passe sont différents";
      echo  $message_erreur;  

      }
    
      }else{

      $message_erreur = "Veuillez remplir tous les champs";
      echo  $message_erreur;  
      }

    } 
    else{
      $message_erreur = "Veuillez vous connecter";
      echo  $message_erreur;  

    }
  }

?>

  </body>
</html>