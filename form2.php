<?php 
	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.lutteur1{
			float: left;
		}

		.lutteur2{
			float: right;
		}
	</style>
</head>
<body>
	<form enctype="multipart/form-data" method="POST" action="traitement2.php">
		<p align="left" class="lutteur1">
			<h2>  Votre tournoi va comporter 4 lutteurs </h2>
			<br>
		<label> Nom Lutteur1</label>
		<br>
			<input type="text" name="wrestler1">
		<br>
		<label> ecurie</label>
		<br>
			<input type="text" name="ecurie1">
		<br>
		<label>coach</label>
		<br>
			<input type="text" name="coach1">
		<br>
		<label> Nombre de victoire</label>
		<br>
			<input type="number" name="victoire1">
		<br>
		<label> Nombre de defaite</label>
		<br>
			<input type="number" name="defaite1">
		<br>
		<label> Poids</label>
		<br>
			<input type="text" name="poids1">
		<br>
		<label> Taille</label>
		<br>
			<input type="text" name="taille1">
		<br>
		</p>
	

		<p align="right" class="lutteur2">
		<label> Nom Lutteur2</label>
		<br>
			<input type="text" name="wrestler2">
			<br>

			<label> ecurie</label>
		<br>
			<input type="text" name="ecurie2">
		<br>
		<label>coach</label>
		<br>
			<input type="text" name="coach2">
		<br>
		<label> Nombre de victoire</label>
		<br>
			<input type="number" name="victoire2">
		<br>
		<label> Nombre de defaite</label>
		<br>
			<input type="number" name="defaite2">
		<br>
		<label> Poids</label>
		<br>
			<input type="text" name="poids2">
		<br>
		<label> Taille</label>
		<br>
			<input type="text" name="taille2">
		<br>
		</p>

		<p align="center">
			<select name="choixArbitre">
				<option value="">Choisir arbitre</option>
				<option value="Arbitre1">Arbitre1</option>
				<option value="Arbitre2">Arbitre2</option>
				<option value="Arbitre3">Arbitre3</option>
			</select> 
			<br>
			<br>
			<label> Date</label>
				<br>
			<input type="Date" name="date">
			<br>
			<br>
			<br>
			<select name="choixHeure">
				<option value="">Choisir heure de rencontre</option>
				<option value="18h">18h</option>
				<option value="18h30">18h30</option>
				<option value="19h">19h</option>
			</select> 
		<br>
		</p>

			
			<br>
			<br>
		<p align="center">
			<select name="round">
				<option value="">Choisir combat</option>
				<option value="1">1</option>
				<option value="2">2</option>
			</select> 
			<br>
			<br>
			<br>
			<select name="choixStade">
				<option value="">Choisir stade</option>
				<option value="dembaDiop">Demba DIOP</option>
				<option value="ibaMar">Iba Mar DIOP</option>
				<option value="amitie">Amitié</option>
			</select> 
			<br>
			<br>
			<input type="submit" name="" value="ValiderCombat">
			<?php 
			if (isset($_SESSION['msg'])) {
						echo "<br>";
						echo "<br>";
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
			?>
	</form>
</body>
</html>