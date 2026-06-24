<?php
 	require('cbd.php');

		if (isset($_GET["v"])){
			$link= $_GET["v"]; 
		}

	// VERIFICAR INICIO DE DIA
	$sql="SELECT c.tipo_documento, c.identificacion from tbl_clientes c WHERE c.codigo_cliente=". $link;
	
	if(!$result= $db->query($sql)){die('Error [' . $db->error . ']');}
	
	$consulta = $result->fetch_array(MYSQLI_NUM);
	$t=$consulta[0];
	$n=$consulta[1];
	$web="/pago_clientes.php";
	header("Location:". $web);
?>