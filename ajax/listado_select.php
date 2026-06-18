<?php
	session_start();
	require_once(dirname(__DIR__)."/conexion/conexion.php");

	$conexion=new conexion_db();

	$res=$conexion->listado_select($_POST["tabla"],$_POST["valor"],$_POST["etiqueta"],$_POST["filtro"]);
	
	echo json_encode($res);
?>