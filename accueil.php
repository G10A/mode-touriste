<?php
  session_start();
?>

<!DOCTYPE html>

<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header_non_connecte.php"); ?>
			<?php include("Base/menu.php"); ?>



			<div id="contenuprincipal">
			
				<p>Bonjour et bienvenue sur le site<br>

					Les vergers a pour but de vendre, acheter ou échanger ses fruits et/ou légumes entre particuliers<br>
					Vous pourrez alors choisir le prix de ventes de vos produits mais aussi choisir la zone préférentielle pour vos affaires<br>
					Si vous ne possédez pas de compte, vous pouvez vous inscrire <a href="inscription.php"> ici </a> </p>

    <div id="diapo">
    	<p><h3>offres récentes:</h3>  </p>
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
        <a href="offres.php">
      </em>
    </div>

</div>
			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
