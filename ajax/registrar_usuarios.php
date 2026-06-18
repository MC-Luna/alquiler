<?php
	include(dirname(__DIR__)."/php/usuarios.php");


	$user =new usuarios();

	$res=$user->registrar_usuario($_POST);

  	echo json_encode($res);
?>