<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Inscription</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
		<body>

		<div id="site">
			<div id="banner1">
				<div class="logo">
				<span id="logo_holder">
					<a href="file:///C:/wamp/www/Les-Vergers/index.html">
					<img src="image/azerty.png" width="100" height="100">
					</a>
				</span>
				</div>
				
				<div id="login">
				<form method="post" action="traitement.php"> 
				    <p style= "font:  17pt serif">
				        <input type="text" name="pseudo" id="pseudo" placeholder="pseudo" size="25" maxlength="10"  /><br>
				        <input type="password" name="MDP" id="MDP" placeholder="mot de passe" size="25" /><br>
				        <input type="submit" name="inscrit"  value=" Connectez vous"/>
				    </p>
				</form>
				</div>
				<div id="langue">
				 <select name=langue style="width:8em">
				  <option value="francais">Francais</option>
				  <option value="english">English</option>
				</select> 
				</div>			

				<div id="titre">
				<p>Les Vergers</p>
				</div>

			</div>
			<div id="menu">
				<ul>
					<li><a href="Accueil.html">Accueil</a></li><!--
					--><li><a href="Profil.html">Profil</a></li><!--
					--><li><a href="Offres.html">Offres</a></li><!--
					--><li><a href="Deposer.html">Deposer une offre</a></li><!--	
					--><li><a href="Forum.html">Forum</a></li><!--
					--><li><a href="Support.html">Support</a></li>
				</ul>
			</div>

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
    	</div>
    </body>

</html>