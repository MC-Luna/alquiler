<?php
	include_once(dirname(dirname(__DIR__))."/conexion/conexion.php");
	include(dirname(dirname(__DIR__))."/php/notificaciones.php");
	
	$notificar = new notificaciones();

	$query = " UPDATE tbl_contratos SET congelado=1 WHERE  codigo_contrato=". $_POST['codigo_contrato'];
	$resultado=$con->ejecutar_sql($query);
	
	$query = " SELECT correo FROM tbl_clientes WHERE codigo_cliente=". $_POST['codigo_cliente'];
	$resultado=$con->ejecutar_sql($query);
	
	$resultado=$resultado->fetch_all(MYSQLI_ASSOC);	
	$email=$resultado[0]["correo"];

	$notificar->consulta($email,'notificacion_congelamiento',' where co.codigo_congelar='. $nuevo_registro);

?>