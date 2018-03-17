<?php 
	session_start();
	
	/*if (isset($_REQUEST['nbLutteur'])) {
		$_SESSION['nbr'] = $_REQUEST['nbLutteur'];
	}
	
	if (($_SESSION['nbr'] != "4") && ($_SESSION['nbr'] != "8")  ) {
		header("location: bantamba1.php");
		$_SESSION['msg'] = "mauvais choix";
	}*/

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Comment voulez vous ajouter vos lutteurs ?</h2>
		<a href="bantamba2.php">Via formulaire</a>
			<br>
			<br>
		<a href="uploadExcelFile.php">Uploader un fichier excel</a>
</body>
</html>