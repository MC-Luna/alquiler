<?php
/*
	require(dirname(dirname(__DIR__))."/conexion/conexion.php");

	$con=new conexion_db();
*/

	include(dirname(dirname(__DIR__))."/php/notificaciones.php");
	
	$notificar = new notificaciones();
	
	$query = " SELECT GROUP_CONCAT(email SEPARATOR ',') as email FROM tbl_usuarios WHERE codigo_rol in (1,2)";
	$resultado=$con->ejecutar_sql($query);
	
	$resultado=$resultado->fetch_all(MYSQLI_ASSOC);	
	$email=$resultado[0]["email"];
	$notificar->consulta($email,'notificacion_sede_nuevo',' where s.codigo_sede='. $nuevo_registro);

?>