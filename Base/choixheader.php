			<?php
			if(isset($_SESSION['pseudo'])){

				include("Base/header_connecte.php");
				include("Base/menu.php");
				include("Base/profil_connecte.php");

			}
			else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}
			?>