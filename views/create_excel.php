<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
	header("Pragma: no-cache"); 
	header("Expires: 0");

	 require('../cbd.php');
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Archivo</th>
						<th>Valor</th>
						<th>Numero Soporte</th>
					</tr>
				<tbody>
		";
		
		$query = mysqli_query($conn, "SELECT * FROM `tbl_contrato_pagos`") or die(mysqli_errno());
		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$fetch['codigo_contrato_pago']."</td>
						<td>".$fetch['archivo']."</td>
						<td>".$fetch['valor']."</td>
						<td>".$fetch['numero_soporte']."</td>
					</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
	
?>