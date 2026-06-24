<?php
	session_start();
	require(dirname(__DIR__)."/conexion/conexion.php");

	$conexion=new conexion_db();

	$orden_grupos = ['Operaciones','Clientes & Ventas','Flota','Finanzas','Configuración','Reportes'];

	$sql="SELECT ac.*
	FROM tbl_rol_accesos rac
	INNER JOIN tbl_accesos ac ON ac.codigo_acceso = rac.codigo_acceso
	WHERE rac.codigo_rol=".$_SESSION["codigo_rol"]."
	ORDER BY FIELD(ac.grupo,'Operaciones','Clientes & Ventas','Flota','Finanzas','Configuración','Reportes'), ac.nombre";

	$resultado=$conexion->ejecutar_sql($sql);

	if($resultado->num_rows > 0){
		$filas = $resultado->fetch_all(MYSQLI_ASSOC);
		$grupos = [];
		foreach($filas as $fila){
			$g = $fila['grupo'] ?? 'Otros';
			$grupos[$g][] = $fila;
		}
		$retorno["grupos"]  = $grupos;
		$retorno["opciones"]= $filas;
		$retorno["resultado"]=1;
	}else{
		$retorno["resultado"]=0;
	}

	echo json_encode($retorno);

?>