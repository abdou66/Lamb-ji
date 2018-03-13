<?php 
	session_start();

	if (isset($_REQUEST['wrestler1']) && isset($_REQUEST['wrestler1']) && isset($_REQUEST['choix1']) && isset($_REQUEST['round'])) {
		
	$_SESSION ['wrestler1'] = $_REQUEST['wrestler1'];
	$_SESSION ['wrestler2'] = $_REQUEST['wrestler2'];
	$_SESSION ['choix1'] = $_REQUEST['choix1'];
	$_SESSION ['choix2'] = $_REQUEST['choix2'];
	$_SESSION ['round'] = $_REQUEST['round'];

}
	if (!empty($_SESSION['wrestler1']) && !empty($_SESSION['wrestler2'])  && !empty($_SESSION['choix1']) && !empty($_SESSION['choix2']) && !empty($_SESSION['round'])) {
		

try{
	$objectPDO = new PDO('mysql:host=localhost;dbname=tournoi', 'root', '', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('ERROR : '.$e->getMessage());
	}/*

						$prepInsert1 = $objectPDO->prepare ('INSERT INTO modele (nom_modele) VALUES (:nom_modele)');
						$result1 = $prepInsert1->execute(array(						
						"nom_modele" => $model
						));*/
						if ($_SESSION ['choix1'] == "quart De Finale") {
							$cpt=1;
							$_SESSION ['cpt'] = $cpt;
							if ($_SESSION ['cpt'] >= 2) break;
							$prepInsert = $objectPDO->prepare("INSERT INTO luteur (nom) VALUES (:nom)");
							$result = $prepInsert->execute(array("nom"=> $_SESSION ['wrestler1']));

							$prepInsert = $objectPDO->prepare("INSERT INTO luteur (nom) VALUES (:nom)");
							$result = $prepInsert->execute(array("nom"=> $_SESSION ['wrestler2']));

							$prepInsert = $objectPDO->prepare("INSERT INTO arbitre (nom) VALUES (:nom)");
							$result = $prepInsert->execute(array("nom"=> $_SESSION ['choix2']));

							$prepInsert = $objectPDO->prepare("INSERT INTO phase (nomPhase) VALUES (:nom)");
							$result = $prepInsert->execute(array("nom"=> $_SESSION ['choix1']));

							$prepInsert = $objectPDO->prepare("INSERT INTO rencontre (Combat) VALUES (:nom)");
							$result = $prepInsert->execute(array("nom"=> $_SESSION ['round']));
							$_SESSION ['cpt']++;
						}
						else{

							$sql1 = $objectPDO->query ("SELECT nom FROM luteur");
						$var1=false;
						while($obj1 = $sql1->fetch()){
							if ($_SESSION['wrestler1'] == $obj1['nom']) {
								if ( $_SESSION['wrestler2'] == $obj1['nom']) {
								
								$sql2 = $objectPDO->query ("SELECT luteurPerdant FROM rencontre ");
								while($obj2 = $sql2->fetch()){
									if ($obj2['luteurPerdant'] == $_SESSION ['wrestler1'] || $obj2['luteurPerdant'] == $_SESSION ['wrestler2']) {									
											$var1=true;
									}	

								}
								}

							}

						} 
							$select=$objectPDO->query("SELECT Combat FROM rencontre ");
							$var2=false;
							while($obj3 = $select->fetch()){
								if ($obj3['Combat'] == $_SESSION ['round']) {
									echo "combat existant";
									$var2=true;
								}
								}
						if (!$var1 && (!$var2)) {
							
							$prepInsert1 = $objectPDO->prepare("INSERT INTO luteur (nom) VALUES (:nom)");
							$result1 = $prepInsert1->execute(array("nom"=> $_SESSION ['wrestler1']));

							$prepInsert2= $objectPDO->prepare("INSERT INTO luteur (nom) VALUES (:nom)");
							$result2 = $prepInsert2->execute(array("nom"=> $_SESSION ['wrestler2']));

							$prepInsert3= $objectPDO->prepare("INSERT INTO arbitre (nom) VALUES (:nom)");
							$result3 = $prepInsert3->execute(array("nom"=> $_SESSION ['choix2']));

							$prepInsert4= $objectPDO->prepare("INSERT INTO phase (nomPhase) VALUES (:nom)");
							$result4= $prepInsert4->execute(array("nom"=> $_SESSION ['choix1']));

							$prepInsert5 = $objectPDO->prepare("INSERT INTO rencontre (Combat) VALUES (:nom)");
							$result1 = $prepInsert5->execute(array("nom"=> $_SESSION ['round']));

							
							}
								

}
						}
						
?>