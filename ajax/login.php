<?php
	require(dirname(__DIR__)."/php/usuarios.php");

	$user =new usuarios();

	//$_POST['email']="jorgemario.com@gmail.com";
	//$_POST['pass']="lh4K25wo";

	$res=$user->login($_POST['email'],$_POST['pass']);

	echo json_encode($res);

?>
