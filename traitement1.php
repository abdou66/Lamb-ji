<?php 
	session_start();
						$var1=false;
						$var1_1=false;
						$var2=false;	
						$id1;
						$id2;					
	if (isset($_REQUEST['wrestler1']) && isset($_REQUEST['wrestler2']) && isset($_REQUEST['choixArbitre']) && isset($_REQUEST['round']) && isset($_REQUEST['ecurie1']) && isset($_REQUEST['victoire1'])  && isset($_REQUEST['defaite1']) && isset($_REQUEST['poids1'])  && isset($_REQUEST['taille1'])  && isset($_REQUEST['coach1'])&& isset($_REQUEST['ecurie2']) && isset($_REQUEST['victoire2'])  && isset($_REQUEST['defaite2']) && isset($_REQUEST['poids2'])  && isset($_REQUEST['taille2'])  && isset($_REQUEST['coach2']) && isset($_REQUEST['date']) && isset($_REQUEST['choixHeure']) && isset($_REQUEST['choixStade'])) {
					
	$_SESSION ['wrestler1'] = $_REQUEST['wrestler1'];
	$_SESSION ['wrestler2'] = $_REQUEST['wrestler2'];
	$_SESSION ['choixArbitre'] = $_REQUEST['choixArbitre'];
	$_SESSION ['round'] = $_REQUEST['round'];
	$_SESSION ['ecurie1'] = $_REQUEST['ecurie1'];
	$_SESSION ['victoire1'] = $_REQUEST['victoire1'];
	$_SESSION ['defaite1'] = $_REQUEST['defaite1'];
	$_SESSION ['poids1'] = $_REQUEST['poids1'];
	$_SESSION ['taille1'] = $_REQUEST['taille1'];
	$_SESSION ['coach1'] = $_REQUEST['coach1'];
	$_SESSION ['ecurie2'] = $_REQUEST['ecurie2'];
	$_SESSION ['victoire2'] = $_REQUEST['victoire2'];
	$_SESSION ['defaite2'] = $_REQUEST['defaite2'];
	$_SESSION ['poids2'] = $_REQUEST['poids2'];
	$_SESSION ['taille2'] = $_REQUEST['taille2'];
	$_SESSION ['coach2'] = $_REQUEST['coach2'];
	$_SESSION ['date'] = $_REQUEST['date'];
	$_SESSION ['choixHeure'] = $_REQUEST['choixHeure'];
	$_SESSION ['choixStade'] = $_REQUEST['choixStade'];

}
	if (!empty($_SESSION['wrestler1']) && !empty($_SESSION['wrestler2'])  && !empty($_SESSION['choixArbitre']) && !empty($_SESSION['round']) && !empty($_SESSION ['victoire1']) && !empty($_SESSION ['ecurie1']) && !empty($_SESSION ['defaite1']) && !empty($_SESSION ['poids1'])  && !empty($_SESSION ['taille1'])  && !empty($_SESSION ['coach1']) && !empty($_SESSION ['victoire2']) && !empty($_SESSION ['ecurie2']) && !empty($_SESSION ['defaite2']) && !empty($_SESSION ['poids2'])  && !empty($_SESSION ['taille2'])  && !empty($_SESSION ['coach2']) && !empty($_SESSION ['date']) && !empty($_SESSION ['choixHeure']) && !empty($_SESSION['choixStade'])) {
		
try{
	$objectPDO = new PDO('mysql:host=localhost;dbname=tournoi', 'root', '', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('ERROR : '.$e->getMessage());
}

				$sql = $objectPDO->query("SELECT luteurPerdant FROM rencontre"); 
				while($obj = $sql->fetch()){
				if ($obj['luteurPerdant'] != NULL) 
					$var = true;								 
					}

					if (!$var) {

			$sql1 = $objectPDO->query ("SELECT nom FROM luteur");
			while($obj1 = $sql1->fetch()){
				if ($_SESSION['wrestler1'] == $obj1['nom']) {

					$sql2 = $objectPDO->query ("SELECT luteurPerdant FROM rencontre ");
						while($obj2 = $sql2->fetch()){
						if ($obj2['luteurPerdant'] == $_SESSION ['wrestler1'])	$var1=true;
						}	
					}								 
					}
					$sql13 = $objectPDO->query ("SELECT nom FROM luteur");
						while($obj13 = $sql13->fetch()){
					if ($_SESSION['wrestler2'] == $obj13['nom']) {

					$sqll = $objectPDO->query ("SELECT luteurPerdant FROM rencontre ");
					
					while($obj21 = $sqll->fetch()){
						if ($obj21['luteurPerdant'] == $_SESSION ['wrestler2'])	$var1_1=true;										
					}
				}
				}
									
				$select=$objectPDO->query("SELECT Combat FROM rencontre ");
				
				while($obj3 = $select->fetch()){
					if ($obj3['Combat'] == $_SESSION ['round']) {
						echo "combat existant";
						$var2=true;
					}
					}							
				if ((!$var1) && (!$var2) && (!$var1_1)) {
				
				$prepInsert1 = $objectPDO->prepare("INSERT INTO luteur (nom, nmbrDvictoir, nmbrDdefet, poid, tail, entrainneur, ecurie) VALUES (:nom1, :nbVic1, :nbDft1, :poids1, :tail1, :coach1, :ecurie1)");
				$result1 = $prepInsert1->execute(array(
					"nom1"=> $_SESSION ['wrestler1'],
					"nbVic1"=> $_SESSION ['victoire1'],
					"nbDft1"=> $_SESSION ['defaite1'],
					"poids1"=> $_SESSION ['poids1'],
					"tail1"=> $_SESSION ['taille1'],
					"coach1"=>$_SESSION ['coach1'] ,
					"ecurie1"=>$_SESSION ['ecurie1']
				));

				$sql1 = $objectPDO->prepare ("SELECT idLutteur FROM luteur WHERE nom  = :DRAME");
				$obj1 = $sql1->execute(array(						
					"DRAME" => $_SESSION ['wrestler1']
			));
		$id1 = $sql1->fetch();

				$prepInsert2= $objectPDO->prepare("INSERT INTO luteur (nom, nmbrDvictoir, nmbrDdefet, poid, tail, entrainneur, ecurie) VALUES (:nom2, :nbVic2, :nbDft2, :poids2, :tail2, :coach2, :ecurie2)");
				$result2 = $prepInsert2->execute(array(
					"nom2"=> $_SESSION ['wrestler2'],
					"nbVic2"=> $_SESSION ['victoire2'],
					"nbDft2"=> $_SESSION ['defaite2'],
					"poids2"=> $_SESSION ['poids2'],
					"tail2"=> $_SESSION ['taille2'],
					"coach2"=> $_SESSION ['coach2'] ,
					"ecurie2"=> $_SESSION ['ecurie2']
				));

				$sql2 = $objectPDO->prepare ("SELECT idLutteur FROM luteur WHERE nom  = :DRAME");
				$obj2 = $sql2->execute(array(						
					"DRAME" => $_SESSION ['wrestler2']
			));
				$id2 = $sql2->fetch();

				$prepInsert3= $objectPDO->prepare("INSERT INTO arbitre (nom) VALUES (:nom)");
				$result3 = $prepInsert3->execute(array("nom"=> $_SESSION ['choixArbitre']));


				$sql3 = $objectPDO->prepare ("SELECT idArbitre FROM arbitre WHERE nom  = :SITOR");
				$obj3 = $sql3->execute(array(						
					"SITOR"=> $_SESSION ['choixArbitre']
			));
				$id3 = $sql3->fetch();


				$prepInsert= $objectPDO->prepare("INSERT INTO stade (nomStade) VALUES (:nom)");
				$result = $prepInsert->execute(array("nom"=> $_SESSION ['choixStade']));

				$sql4 = $objectPDO->prepare ("SELECT idStade FROM stade WHERE nomStade  = :lss");
				$obj4 = $sql4->execute(array(						
					"lss"=> $_SESSION ['choixStade']
			));
				$id4 = $sql4->fetch();


				$prepInsert4 = $objectPDO->prepare("INSERT INTO rencontre (Combat, dat, heure, idLutteur1, idLutteur2, idArbitre, idStade) VALUES (:nom, :dat, :heure, :id1, :id2, :id3, :id4)"
			);
				$result4 = $prepInsert4->execute(array(
					"nom"=> $_SESSION ['round'],
					"dat"=>$_SESSION ['date'],
					"heure"=>$_SESSION ['choixHeure'],
					"id1"=> $id1['idLutteur'],
					"id2"=> $id2['idLutteur'],
					"id3"=> $id3['idArbitre'],
					"id4"=> $id4['idStade']
				));


					$_SESSION['var']++;
					echo $_SESSION['var'];
				}	

				if ($_SESSION['var']==4) {
							$_SESSION['var'] = 0;
						header("location: quartDeFinale.php");
							}	
						}
				}	else {
	$_SESSION['msg'] = "Veuillez remplir tous les champs";
	header("location: form1.php");
}
						
?>