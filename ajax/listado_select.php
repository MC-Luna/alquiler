<?php
	session_start();
	set_error_handler(function($errno, $errstr, $errfile, $errline) {
		if ($errno === E_NOTICE || $errno === E_USER_NOTICE || $errno === E_DEPRECATED) {
			return false;
		}
		http_response_code(200);
		echo json_encode(['error' => "PHP Error [$errno]: $errstr en $errfile linea $errline"]);
		exit();
	});
	require_once(dirname(__DIR__)."/conexion/conexion.php");

	$conexion=new conexion_db();

	$res=$conexion->listado_select($_POST["tabla"],$_POST["valor"],$_POST["etiqueta"],$_POST["filtro"]);

	echo json_encode($res);
?>
