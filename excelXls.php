<?php
	require_once 'Classes/PHPExcel.php';

		if (empty($_FILES)) {
			echo "
			<form method ='POST' enctype ='multipart/form-data action = 'excelXls.php'>
				<input type = 'file' name = 'xlsFormat'>
				<br>
				<button type = 'submit'>Fetch</button> 

			";
			
		}
		else{
$excel = PHPExcel_IOFactory::load($_FILES['excelXls']['tmp_name'] );
$excel->setActiveSheetIndex(0);

 echo "<table>";
 $i = 4;
 while ( $excel->getActiveSheet()->getCell('A'.$i)->getValue() != "" ) {
 	 
 	 $lutteur = $excel->getActiveSheet()->getCell('A'.$i)->getValue();

 	 $phase = $excel->getActiveSheet()->getCell('B'.$i)->getValue();

 	 $arbitre = $excel->getActiveSheet()->getCell('C'.$i)->getValue();

 	 $combat = $excel->getActiveSheet()->getCell('D'.$i)->getValue();

 	 echo "
 	 		<tr>
 	 			<td>". $lutteur." </td>
 	 			<td>". $phase." </td>
 	 			<td>". $arbitre." </td>
 	 			<td>". $combat." </td>
 	 		</tr>
 	 ";

 	 $i++;
 }



 echo "</table>";
 }
?>