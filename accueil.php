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

          <div id="diapo">
            <p><h3>offres récentes</h3>  </p>
              <em id="thumbs">
                <a href="offres.php">
                  <img src="image/tomatescerises.jpg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/pdt.jpeg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/banane.jpeg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/pommes.jpg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/abricots.png" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/courgettes.jpg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/aubergines.jpg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/tomates.jpg" title="" alt=""></a>
                <a href="offres.php">
                  <img src="image/fraises.jpg" title="" alt=""></a>
              </em>
          </div>


          <div id="message_accueil">
                  <?php
                if(isset($_SESSION['pseudo'])){
            ?>

      
        <p><span class="debug">Bonjour et bienvenue sur le site<br>

          Les vergers a pour but de vendre, acheter ou échanger ses fruits et/ou légumes entre particuliers</br>
          Vous pourrez alors choisir le prix de ventes de vos produits mais aussi choisir la zone préférentielle pour vos affaires</span></p><br>

                        <?php
                }
                else{ ?>

				<p><span class="debug">Bonjour et bienvenue sur le site<br>

					Les vergers a pour but de vendre, acheter ou échanger ses fruits et/ou légumes entre particuliers.</br>
					Vous pourrez alors choisir le prix de ventes de vos produits mais aussi choisir la zone préférentielle pour vos affaires.<br>
					Si vous ne possédez pas de compte, vous pouvez vous inscrire</span></p>

          <?php } ?>
        </div>

    </div>

    </div>
			<?php include("Base/footer.php"); ?>
		</div>
  
	</body>
</html>
