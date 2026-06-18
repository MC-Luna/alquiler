<?php

require(dirname(__DIR__)."/php/usuarios.php");

	$user=new usuarios();

	$resultado=$user->forgetPassword($_POST['email']);	
	
  	echo json_encode($resultado);

?>