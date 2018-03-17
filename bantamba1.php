<?php 
	session_start();

 ?>
	<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form enctype="multipart/form-data" method="POST">
		
			<p>
				<h2> Veuillez choisir le nombre de lutteurs du tournoi entre 4 et 8</h2>
				<select name="nbLutteur">
				<option value="4">4</option>
				<option value="8">8</option>
			</select> 

			</p>
			<br>
	
			<input type="submit" name="" value="ValiderCombat">
				<?php

				if (isset($_REQUEST['nbLutteur'])) {
						$_SESSION['nbLutteur'] = $_REQUEST['nbLutteur'];

				if ($_SESSION['nbLutteur'] == 8) {
						header("location: form1.php" );
					}

					if ($_SESSION['nbLutteur'] == 4) {
						header("location: form2.php" );
					}
				}

				 ?>


	</form>
</body>
</html>
