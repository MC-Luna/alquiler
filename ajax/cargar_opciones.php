<?php
	session_start();
	require(dirname(__DIR__)."/conexion/conexion.php");

	$conexion=new conexion_db();

	$sql="SELECT 
	
	ac.* 

	FROM tbl_rol_accesos rac

	inner join tbl_accesos ac on
	ac.codigo_acceso=  rac.codigo_acceso
	
	where rac.codigo_rol=".$_SESSION["codigo_rol"] ."

	ORDER BY ac.nombre";

	$resultado=$conexion->ejecutar_sql($sql);
			
	if($resultado->num_rows > 0){
		$resultado = $resultado->fetch_all(MYSQLI_ASSOC);

		$retorno["opciones"]=$resultado;
		$retorno["resultado"]=1;
	}else{
		$retorno["resultado"]=0;
	}

	echo json_encode($retorno);

?>