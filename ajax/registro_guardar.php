<?php
	include(dirname(__DIR__)."/php/registros.php");
	$registro =new registro();
	$res=$registro->guardar($_POST);
	echo json_encode($res);
?>